<?php


namespace App\Http\Controllers;


use App\Http\Requests\CertificateStoreRequest;
use App\Http\Requests\CertificateUpdateRequest;
use App\Http\Resources\CertificateResources;
use App\Models\Certificate;
use App\Models\CertificateDetail;
use App\Models\Status;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CertificateController extends Controller
{
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
            $data['user_id']    = Auth::id();
            $data['expired']    = Carbon::parse($request->issue_date)->addYear()->toDateString();
            $data['status_id']  = $request->has('status_id') && $request->status_id != '' ? $request->status_id:$status->id;

            $certificate        = Certificate::create($data);

            $certificateDetail  = $this->buildDetail($data);

            return $certificate->details()->saveMany($certificateDetail) ? $this->storeTrue('sertifikat') : $this->storeFalse('sertifikat');
        else:
            return $this->unAuthorized();
        endif;
    }

    public function update(CertificateUpdateRequest $request, $id)
    {
        if ($this->user->can('update certificate')):
            $certificate = Certificate::find($id);

            if ($certificate) {
                $data = $request->all();

                if ($certificate->isssue_date <> Carbon::parse($request->issue_date)->toDateString()) {
                    CertificateDetail::where('certificate_id', $id)->delete();

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

            return $this->dataNotFound($certificate);
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
        $expired        = Certificate::where('status', 'Expired')->get()->count();
        $willExpired    = Certificate::whereBetween('expired', [$now, $nowAddMonth])->get()->count();

        return response()->json([
            'total'         => $total,
            'active'        => $active,
            'expired'       => $expired,
            'will_expired'  => $willExpired
        ], 200);
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

    public function generateExcel(Request $request)
    {
        $keyword    = $request->keyword;
        $statusApp  = $request->status_app;
        $status     = $request->status;
        $startDate  = $request->start_date;
        $endDate    = $request->end_date;

        $certificates = Certificate::with(['client:id,code,name', 'product', 'status_app'])
            ->when($status, function ($q) use ($status) {
                $q->where('status', $status);
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
    }
}
