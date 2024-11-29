<?php

namespace App\Console\Commands;

use App\Models\Certificate;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class CheckExpiredCertificate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'daily:check_expired_certificate';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update status expired certificate';
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

        // Suspended
        $certificates = Certificate::query()
            ->where('status', '=', Certificate::STATUS_ACTIVE)
            ->whereRaw("DATE_ADD(expired, INTERVAL 3 MONTH) = '{$today}'")
            ->get();
        Log::info($certificates);
        foreach ($certificates as $certificate) {
            $certificate->update([
                'status' => Certificate::STATUS_SUSPEND
            ]);
        }

        // Withdraw
        $certificates = Certificate::query()
            ->where('status', '=', Certificate::STATUS_SUSPEND)
            ->whereRaw("DATE_ADD(expired, INTERVAL 6 MONTH) = '{$today}'")
            ->get();
        Log::info($certificates);
        foreach ($certificates as $certificate) {
            $certificate->update([
                'status' => Certificate::STATUS_WITHDRAW
            ]);
        }

        // Expired
        $certificates = Certificate::query()
            ->where('status', '!=', Certificate::STATUS_ACTIVE)
            ->whereRaw("DATE_ADD(issue_date, INTERVAL 36 MONTH) = '{$today}'")
            ->get();
        Log::info($certificates);
        foreach ($certificates as $certificate) {
            $certificate->update([
                'status' => Certificate::STATUS_EXPIRED
            ]);
        }
    }
}
