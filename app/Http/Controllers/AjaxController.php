<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AjaxController extends Controller
{
    /**
     * Get states.
     */
    public function get_states($req)
    {
        $states = DB::table('state')->where('countryid', '=', $req)->get(['id', 'statename']);
        return response()->json($states);
    }

    /**
     * Get Cities.
     */
    public function get_cities($req)
    {
        $cities = DB::table('city')->where('stateid', '=', $req)->get(['id', 'city']);
        return response()->json($cities);
    }

    /**
     * Get Bank And Branch Name.
     */
    public function get_bank_branch($req)
    {
        $val = DB::table('bank_details')->where('bank_ifsc', '=', $req)->get();
        return response()->json($val);
    }


}
