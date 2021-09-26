<?php

namespace App\Console\Commands;

use App\Models\Certificate;
use App\Models\CertificateDetail;
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
        $details = CertificateDetail::where('issue_date', '<=', $today)->where('is_active', '=', '0')->get();
        Log::info($details);
        foreach ($details as $detail) {
            $detail->update([
                'is_active' => '1'
            ]);
        }
    }
}
