<?php

namespace App\Console\Commands;

use App\Models\Certificate;
use App\Models\CertificateDetail;
use App\Models\Status;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class CheckStatusCertificate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'daily:check_status_certificate';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update status detail certificate';
    /**
     * Create a new command instance.
     *
     * @return void
     */

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $today = Carbon::now()->toDateString();
        Log::info($today);
        $details = CertificateDetail::with(['certificate'])
            ->where('issue_date', '=', $today)
            ->where('status_id', '!=', Status::STATUS_TRANSFER)
            ->get();
        Log::info($details);
        foreach ($details as $detail) {
            $detail->certificate->update([
                'status_id' => $detail->status_id
            ]);

            $detail->update([
                'is_active' => '1'
            ]);
        }
    }
}
