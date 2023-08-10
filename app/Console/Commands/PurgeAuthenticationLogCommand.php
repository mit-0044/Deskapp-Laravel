<?php

namespace App\Console\Commands;

use App\Models\AuthenticationLog;
use Illuminate\Console\Command;

class PurgeAuthenticationLogCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:purge-authentication-log-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Purge all authentication logs older than the configurable amount of days.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->comment('Clearing authentication log...');
        $deleted = AuthenticationLog::where('login_at', '<', now()->subDays(config('authentication-log.purge'))->format('Y-m-d H:i:s'))->delete();
        $this->info($deleted . ' authentication logs cleared.');
    }
}
