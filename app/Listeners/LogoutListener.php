<?php

namespace App\Listeners;

use App\Models\AuthenticationLog;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Auth\Events\Logout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutListener
{
    public Request $request;

    /**
     * Create the event listener.
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        $listener = config('authentication-log.events.logout', Logout::class);
        if (!$event instanceof $listener) {
            return;
        }

        if ($event->user) {
            $user = $event->user;
            $ip = $this->request->ip();
            $userAgent = $this->request->userAgent();
            $log = $user->authentications()->whereIpAddress($ip)->whereUserAgent($userAgent)->orderByDesc('login_at')->first();

            if (!$log) {
                $log = new AuthenticationLog([
                    'ip_address' => $ip,
                    'user_agent' => $userAgent,
                ]);
            }
            $user = User::where('email', '=', Auth::user()->email)->update([
                'login_status' => 0,
                'logout_at' => Carbon::now()->toDateTimeString(),
            ]);;

            $log->logout_at = now();
            $user->authentications()->save($log);
        }
    }
}
