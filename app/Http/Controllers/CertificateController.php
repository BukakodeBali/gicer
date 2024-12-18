<?php


namespace App\Http\Controllers;


use App\Http\Requests\CertificateStoreRequest;
use App\Http\Requests\CertificateUpdatePasswordRequest;
use App\Http\Requests\CertificateUpdateRequest;
use App\Http\Resources\CertificateExpiredResources;
use App\Http\Resources\CertificateResources;
use App\Models\Certificate;
use App\Models\CertificateDetail;
use App\Models\Client;
use App\Models\Product;
use App\Models\Status;
use App\Models\User;
use App\Traits\ExcelStyle;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use LaravelQRCode\Facades\QRCode;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class CertificateController extends Controller
{
    use ExcelStyle;
    public $user;
    public function __construct()
    {
        $this->user = Auth::user();
    }

    public function index(Request $request)
    {
        if ($this->user->can('show certificates')):
            $keyword    = $request->keyword;
            $perPage    = $request->per_page;
            $issueDate  = $request->input('issue_date', false);
            $statusApp  = $request->status_app;
            $status     = $request->status;
            $startDate  = $request->start_date;
            $endDate    = $request->end_date;

            $certificates = Certificate::query()
                ->with(['client:id,code,name', 'product', 'status_app'])
                ->when($status, function ($q) use ($status) {
                    $q->where('status', $status);
                })
                ->when($issueDate, function ($q) use ($issueDate){
                    $q->whereDate('issue_date', $issueDate);
                })
                ->when($startDate <> '' && $endDate <> '', function ($q) use ($startDate, $endDate) {
                    $q->whereBetween('expired', [$startDate, $endDate]);
                })
                ->when($statusApp <> '', function ($q) use ($statusApp) {
                    $q->where('status_id', $statusApp);
                })
                ->when($keyword <> '', function ($q) use ($keyword){
                    $q->whereHas('client', function ($q) use ($keyword) {
                        $q->where('code', 'like', "%{$keyword}%")
                            ->orWhere('name', 'like', "%{$keyword}%");
                    });
                })->orderBy('id', 'desc');

            $certificates = $perPage == 'all' ? $certificates->get():$certificates->paginate($perPage);
            return CertificateResources::collection($certificates);
        else:
            return $this->unAuthorized();
        endif;
    }

    public function store(CertificateStoreRequest $request)
    {
        if ($this->user->can('create certificate')):
            $data               = $request->all();
            $status             = Status::oldest()->first();
            $data['created_by']    = Auth::id();
            $data['expired']    = Carbon::parse($request->issue_date)->addYear()->toDateString();
            $data['status_id']  = $request->has('status_id') && $request->filled('status_id') ? $request->status_id:$status->id;
            $data['original_date'] = $data['issue_date'];

            $client = Client::find($data['client_id']);
            if (!$client) {
                return $this->storeFalse('sertifikat, client not found');
            }

            $product = Product::find($data['product_id']);
            if (!$product) {
                return $this->storeFalse('sertifikat, product not found');
            }

            $code = env('CERTIFICATE_PREFIX').'/'.$client->code.'/'.$product->code;
            // check code exists
            $checkCode = Certificate::query()
                ->where('code', $code)
                ->first();
            if ($checkCode) {
                $latestCertificate = Certificate::query()
                    ->latest()
                    ->first();

                $code = env('CERTIFICATE_PREFIX').'/'.$client->code.'/'.$product->code.'/'.($latestCertificate->id + 1);
            }

            $password = Str::random(8);
            $data['code'] = $code;
            $data['password'] = $password;

            $user = [
                'username'  => $data['code'],
                'email'     => $data['code'],
                'password'  => app('hash')->make($password),
            ];

            DB::beginTransaction();
            try {
                $user = User::create($user);
                $data['user_id'] = $user->id;
                $user->assignRole('Client');

                $certificate        = Certificate::create($data);
                $hash = app('hash')->make($certificate->id.Str::random(10));
                $hash = preg_replace('/[^A-Za-z0-9\-]/', '', $hash);
                $certificate->hash = $hash;
                $certificate->save();


                $storagePath= Storage::disk('local')->getDriver()->getAdapter()->getPathPrefix();
                $filename   = $certificate->id.'.PNG';
                $filepath   = $storagePath.'certificates/'.$filename;
                $qrurl      = env('APP_CLIENT_URL').'/verify-certificate/'.$hash;

                QRCode::url($qrurl)
                    ->setOutfile($filepath)
                    ->setSize(8)
                    ->setMargin(2)
                    ->setErrorCorrectionLevel('H')
                    ->png();

                $certificateDetail  = $this->buildDetail($data);
                $certificate->details()->saveMany($certificateDetail);

                DB::commit();

                return $this->storeTrue('sertifikat');
            } catch (\Exception $e) {
                DB::rollBack();
                Log::info($e->getMessage());
                return $this->storeFalse('sertifikat');
            }
        else:
            return $this->unAuthorized();
        endif;
    }

    public function update(CertificateUpdateRequest $request, $id)
    {
        if ($this->user->can('update certificate')):
            $certificate = Certificate::find($id);
            if (!$certificate->code) {
                $client = Client::find($certificate->client_id);
                if (!$client) {
                    return $this->storeFalse('sertifikat, client not found');
                }

                $product = Product::find($certificate->product_id);
                if (!$product) {
                    return $this->storeFalse('sertifikat, product not found');
                }

                $code = env('CERTIFICATE_PREFIX').'/'.$client->code.'/'.$product->code;
                // check code exists
                $checkCode = Certificate::query()
                    ->where('code', $code)
                    ->first();
                if ($checkCode) {
                    $code = env('CERTIFICATE_PREFIX').'/'.$client->code.'/'.$product->code.'/'.$certificate->id;
                }

                $password = Str::random(8);
                $user = [
                    'username'  => $code,
                    'email'     => $code,
                    'password'  => app('hash')->make($password),
                ];

                $user = User::create($user);
                $user->assignRole('Client');
                $certificate->code = $code;
                $certificate->password = $password;
                $certificate->user_id = $user->id;
                $certificate->save();
            }


            if ($certificate->qr_code === '') {
                $hash = app('hash')->make($certificate->id.Str::random(10));
                $hash = preg_replace('/[^A-Za-z0-9\-]/', '', $hash);
                $certificate->hash = $hash;
                $certificate->save();

                $storagePath= Storage::disk('local')->getDriver()->getAdapter()->getPathPrefix();
                $filename   = $certificate->id.'.PNG';
                $filepath   = $storagePath.'certificates/'.$filename;
                $qrurl      = env('APP_CLIENT_URL').'/verify-certificate/'.$hash;

                QRCode::url($qrurl)
                    ->setOutfile($filepath)
                    ->setSize(8)
                    ->setMargin(2)
                    ->setErrorCorrectionLevel('H')
                    ->png();
            }

            if ($certificate) {
                $data = $request->all();
                if ($request->reset_detail) {
                    CertificateDetail::query()
                        ->where('certificate_id', $id)
                        ->delete();
                    $certificateDetail = $this->buildDetail($data);
                    $certificate->details()->saveMany($certificateDetail);
                }

                return $certificate->update($data) ? $this->updateTrue('sertifikat') : $this->updateFalse('sertifikat');
            }

            return $this->dataNotFound($certificate);
        else:
            return $this->unAuthorized();
        endif;
    }

    public function destroy($id)
    {
        if ($this->user->can('delete certificate')):
            $certificate = Certificate::find($id);
            if ($certificate) {
                return $certificate->delete() ? $this->destroyTrue('sertifikat') : $this->storeFalse('sertifikat');
            }

            return $this->dataNotFound('sertifikat');
        else:
            return $this->unAuthorized();
        endif;
    }

    public function dashboard()
    {
        $now            = Carbon::now()->toDateString();
        $nowAddMonth    = Carbon::now()->addMonth()->toDateString();
        $total          = Certificate::all()->count();
        $active         = Certificate::where('status', 'Active')->get()->count();
        $expired        = Certificate::where('status', 'Non Active')->get()->count();
        $willExpired    = Certificate::whereBetween('expired', [$now, $nowAddMonth])->get()->count();

        return response()->json([
            'total'         => $total,
            'active'        => $active,
            'expired'       => $expired,
            'will_expired'  => $willExpired
        ], 200);
    }

    public function willExpired()
    {
        $now            = Carbon::now()->toDateString();
        $nowAddMonth    = Carbon::now()->addMonth()->toDateString();
        $willExpireds   = Certificate::with(['client'])->whereBetween('expired', [$now, $nowAddMonth])->get();
        return CertificateExpiredResources::collection($willExpireds);
    }

    public function expired()
    {
        $now            = Carbon::now()->toDateString();
        $monthBefore    = Carbon::now()->subMonth()->toDateString();
        $expireds       = Certificate::with(['client'])->whereBetween('expired', [$monthBefore, $now])->get();
        return CertificateExpiredResources::collection($expireds);
    }

    public function buildDetail(Array $data)
    {
        $status     = Status::get();
        $details    = [];
        $startDate  = Carbon::parse($data['issue_date']);
        $period     = 0;

        foreach ($status as $key => $status) {
            $isActive = $status->id == $data['status_id'] ? 1:0;
            $period = $period + $status->period;
            $date = $startDate->copy()->addMonths($period);
            $issueDate = $date->toDateString();
            $details[] = new CertificateDetail([
                'status_id'     => $status->id,
                'issue_date'    => $issueDate,
                'is_active'     => $isActive
            ]);
        }

        return $details;
    }

    public function updateIssueDateDetail(Request $request)
    {
        $this->validate($request, [
            'detail_id' => 'required|exists:certificates_details,id',
            'issue_date' => 'required|date'
        ]);

        $detailId = $request->detail_id;
        $issueDate = Carbon::parse($request->issue_date);
        $detail = CertificateDetail::find($detailId);
        $detail->issue_date = $issueDate->toDateString();
        $detail->save();

        return $this->updateTrue('Detail sertifikat');
    }

    public function updatePassword(CertificateUpdatePasswordRequest $request, $id)
    {
        if (!$this->user->can('update certificate')) {
            return $this->unAuthorized();
        }

        $password = $request->password;

        $certificate = Certificate::find($id);
        if (!$certificate) {
            return $this->dataNotFound('Certificate not found');
        }

        $user = User::find($certificate->user_id);
        if (!$user) {
            return $this->dataNotFound('User not found');
        }

        DB::beginTransaction();
        try {
            $certificate->password = $password;
            $certificate->save();

            $user->password = app('hash')->make($password);
            $user->save();

            DB::commit();
            return $this->updateTrue('Password');
        } catch (\Throwable $e) {
            DB::rollBack();

            return $this->updateFalse('Password');
        }
    }

    public function generateExcel(Request $request)
    {
        $keyword    = $request->keyword;
        $issueDate  = $request->input('issue_date', false);
        $statusApp  = $request->status_app;
        $status     = $request->status;
        $startDate  = $request->start_date;
        $endDate    = $request->end_date;

        $certificates = Certificate::with(['client:id,code,name', 'product', 'status_app'])
            ->when($status, function ($q) use ($status) {
                $q->where('status', $status);
            })
            ->when($issueDate, function ($q) use ($issueDate){
                $q->whereDate('issue_date', $issueDate);
            })
            ->when($startDate <> '' && $endDate <> '', function ($q) use ($startDate, $endDate) {
                $q->whereBetween('expired', [$startDate, $endDate]);
            })
            ->when($statusApp <> '', function ($q) use ($statusApp) {
                $q->where('status_id', $statusApp);
            })
            ->when($keyword <> '', function ($q) use ($keyword){
                $q->whereHas('client', function ($q) use ($keyword) {
                    $q->where('code', 'like', "%{$keyword}%")
                        ->orWhere('name', 'like', "%{$keyword}%");
                });
            })->orderBy('id', 'desc')->get();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setTitle('Data Sertifikat');

        $i = 1;

        $sheet->getColumnDimension('A')->setWidth(5);
        $sheet->getColumnDimension('B')->setAutoSize(true);
        $sheet->getColumnDimension('C')->setAutoSize(true);
        $sheet->getColumnDimension('D')->setAutoSize(true);
        $sheet->getColumnDimension('E')->setAutoSize(true);
        $sheet->getColumnDimension('F')->setAutoSize(true);
        $sheet->getColumnDimension('G')->setAutoSize(true);
        $sheet->getColumnDimension('H')->setAutoSize(true);

        $cells  = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H'];
        $columns= ['No', 'Kode Sertifikat', 'Kode Klien', 'Klien', 'Produk', 'Status App', 'Issue Date', 'Expired'];
        $sheet->getStyle('A'.$i.':H'.$i)->getFont()->setBold(true);
        $sheet->getStyle('A'.$i.':H'.$i)->applyFromArray($this->horizontalCenter());
        $sheet->getStyle('A'.$i.':H'.$i)->applyFromArray($this->border());
        foreach ($columns as $key => $column) {
            $sheet->setCellValue($cells[$key].$i, $column);
        }

        $i++;
        $start = $i;
        foreach ($certificates as $key => $certificate) {
            $sheet->setCellValue('A'.$i, $key+1);
            $sheet->setCellValue('B'.$i, $certificate->code);
            $sheet->setCellValue('C'.$i, $certificate->client->code);
            $sheet->setCellValue('D'.$i, $certificate->client->name);
            $sheet->setCellValue('E'.$i, $certificate->product->number." : ".$certificate->product->period." ".$certificate->product->name);
            $sheet->setCellValue('F'.$i, $certificate->status_app->name);
            $sheet->setCellValue('G'.$i, $certificate->issue_date);
            $sheet->setCellValue('H'.$i, $certificate->expired);
            $i++;
        }

        $writer = new Xlsx($spreadsheet);
        ob_start();
        $writer->save('php://output');
        $content = ob_get_contents();
        ob_end_clean();
        $fileName = "sertifikat.xlsx";
        Storage::disk('local')->put('excel/'.$fileName, $content);
        $file = url('/excel/'.$fileName);
        return response()->json($file, 200);
    }
}
