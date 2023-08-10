<?php

namespace App\Http\Controllers;

use App\Mail\NewDevice;
use App\Models\AuthenticationLog;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class IndexController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function dashboard()
    {
        return view('dashboard');
    }

    public function auth_logs()
    {
        $data = AuthenticationLog::get();
        return view('auth.auth_logs', compact(['data']));
    }

    public function auth_logs_view($id)
    {
        $auth = AuthenticationLog::Where('id', '=', $id)->get();
        return view('auth.auth_logs_view', compact(['auth']));
    }

    public function authentications_dashboard()
    {
        $data = User::get();
        return view('auth.authentications_dashboard', compact(['data']));
    }

    public function new_device()
    {
        $user = Auth::user()->login_at;
        $auth = AuthenticationLog::where('login_at', '=', $user)->get();
        $auth = $auth[0];

        $data['to'] = 'mitpatel0044@gmail.com';
        $data['account'] = Auth::user()->email;
        $time = Carbon::parse(Auth::user()->login_at);
        $data['time'] = $time->isoFormat('dddd, MMMM Do YYYY, h:mm:ss A, z');
        $data['ip_address'] = $auth->ip_address;
        $data['browser'] = $auth->user_agent;
        $data['location'] = $auth['location']['city'] . ', ' . $auth['location']['country'];

        Mail::to($data['to'])->send(new NewDevice($data));
        dd('Mail Sent');
    }

    public function myTestEmail()
    {
        // return view('vendor.authentication-log.emails.failed');
        return view('emails.myTestEmail');
    }

    public function pricing()
    {
        return view('pricing');
    }

}
