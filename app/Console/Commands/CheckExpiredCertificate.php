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
        $certificates = Certificate::where('status', '=', 'Active')->where('expired', '=', $today)->get();
        Log::info($certificates);
        foreach ($certificates as $certificate) {
            $certificate->update([
                'status' => 'Suspend'
            ]);
        }

        $certificates = Certificate::where('status', '=', 'Suspend')->whereRaw("DATE_ADD(expired, INTERVAL 1 MONTH) = '{$today}'")->get();
        Log::info($certificates);
        foreach ($certificates as $certificate) {
            $certificate->update([
                'status' => 'Non Active'
            ]);
        }
    }
}