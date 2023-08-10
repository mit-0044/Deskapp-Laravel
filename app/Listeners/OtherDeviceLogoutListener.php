<?php

namespace App\Listeners;

use App\Models\AuthenticationLog;
use Illuminate\Auth\Events\OtherDeviceLogout;
use Illuminate\Http\Request;

class OtherDeviceLogoutListener
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
        $listener = config('authentication-log.events.other-device-logout', OtherDeviceLogout::class);
        if (!$event instanceof $listener) {
            return;
        }

        if ($event->user) {
            $user = $event->user;
            $ip = $this->request->ip();
            $userAgent = $this->request->userAgent();
            $authenticationLog = $user->authentications()->whereIpAddress($ip)->whereUserAgent($userAgent)->first();

            if (!$authenticationLog) {
                $authenticationLog = new AuthenticationLog([
                    'ip_address' => $ip,
                    'user_agent' => $userAgent,
                ]);
            }

            foreach ($user->authentications()->whereLoginSuccessful(true)->whereNull('logout_at')->get() as $log) {
                if ($log->id !== $authenticationLog->id) {
                    $log->update([
                        'cleared_by_user' => true,
                        'logout_at' => now(),
                    ]);
                }
            }
        }
    }
}
