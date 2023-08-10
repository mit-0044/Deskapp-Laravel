<?php

namespace App\Providers;

use App\Console\Commands\PurgeAuthenticationLogCommand;
use App\Listeners\FailedLoginListener;
use App\Listeners\LoginListener;
use App\Listeners\LogoutListener;
use App\Listeners\OtherDeviceLogoutListener;
use App\Providers\PackageServiceProvider as ProvidersPackageServiceProvider;
use Illuminate\Auth\Events\Failed;
use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Logout;
use Illuminate\Auth\Events\OtherDeviceLogout;
use Illuminate\Events\Dispatcher;
use Spatie\LaravelPackageTools\Package;

class LaravelAuthenticationLogServiceProvider extends ProvidersPackageServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }

    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-authentication-log')
            ->hasConfigFile()
            ->hasTranslations()
            ->hasViews()
            ->hasMigration('create_authentication_log_table')
            ->hasCommand(PurgeAuthenticationLogCommand::class);

        $events = $this->app->make(Dispatcher::class);
        $events->listen(config('authentication-log.events.login', Login::class), LoginListener::class);
        $events->listen(config('authentication-log.events.failed', Failed::class), FailedLoginListener::class);
        $events->listen(config('authentication-log.events.logout', Logout::class), LogoutListener::class);
        $events->listen(config('authentication-log.events.other-device-logout', OtherDeviceLogout::class), OtherDeviceLogoutListener::class);
    }
}

