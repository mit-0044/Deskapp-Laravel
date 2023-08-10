<?php

namespace App\Http\Controllers;

use App\Models\DebitCard;
use App\Http\Requests\StoreDebitCardRequest;
use App\Http\Requests\UpdateDebitCardRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Mail\sendMail;
use \PDF;
use Illuminate\Support\Facades\Mail;

class DebitCardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cards = DebitCard::all();
        return view('debit_cards.index', compact('cards'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $country = DB::table('country')->get();
        return view('debit_cards.create', compact('country'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDebitCardRequest $req)
    {
        do {
            $refrence_id = mt_rand(1000000000, 9999999999);
        } while (DebitCard::where('arg_id', '=', $refrence_id)->exists());

        $arr = [];
        for ($i = 0; $i < count($req->arg_documents); $i++) {
            $filename = $refrence_id . '_doc' . $i . '.' . $req->arg_documents[$i]->extension();
            $documents = array_push($arr, $filename);
            $req->file('arg_documents')[$i]->storeAs('public/credit_card_documents', $filename, 'local');
        }
        $documents = json_encode($arr);

        DebitCard::create([
            'arg_id' => $refrence_id,
            'arg_fname' => $req->arg_fname,
            'arg_midname' => $req->arg_midname,
            'arg_surname' => $req->arg_surname,
            'arg_email'  => $req->arg_email,
            'arg_mobile' => $req->arg_mobile,
            'arg_dob' => Carbon::createFromFormat('Y-m-d', $req->arg_dob)->format('d/m/Y'),
            'arg_ifsc' => strtoupper($req->arg_ifsc),
            'arg_bank' => $req->arg_bank,
            'arg_branch' => $req->arg_branch,
            'arg_account' => $req->arg_account,
            'arg_confirm_account' => $req->arg_confirm_account,
            'arg_account_type' => $req->arg_account_type,
            'arg_card_type' => implode(',', $req->arg_card_type),
            'arg_service_type' => implode(',', $req->arg_service_type),
            'arg_document' => $documents,
            'arg_address_line_1' => $req->arg_address_line_1,
            'arg_address_line_2' => $req->arg_address_line_2,
            'arg_country' => $req->arg_country,
            'arg_state' => $req->arg_state,
            'arg_city' => $req->arg_city,
            'arg_pincode' => $req->arg_pincode,
        ]);

        return redirect(route('debit_card.index'))->with('success', 'Application Details has been added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(DebitCard $debitCard)
    {
        $cards = DebitCard::where('id', '=', $debitCard->id)->get();
        $cities = DB::table('city')->where('id', '=', $cards[0]->arg_city)->get();
        $states = DB::table('state')->where('id', '=', $cards[0]->arg_state)->get();
        $countries = DB::table('country')->where('countryid', '=', $cards[0]->arg_country)->get(['country']);
        $city = $cities[0]->city;
        $state = $states[0]->statename;
        $country = $countries[0]->country;
        return view('debit_cards.show', compact(['cards', 'city', 'state', 'country']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DebitCard $debitCard)
    {
        $cards = DebitCard::where('id', '=', $debitCard->id)->get();
        $country = DB::table('country')->get();
        $state = DB::table('state')->where('countryid', '=', $cards[0]->arg_country)->get();
        $city = DB::table('city')->where('stateid', '=', $cards[0]->arg_state)->get();
        return view('debit_cards.edit', compact(['cards', 'country', 'state', 'city']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDebitCardRequest $req, DebitCard $debitCard)
    {
        dd($req);
        $arr = [];
        for ($i = 0; $i < count($req->arg_documents); $i++) {
            $filename = $debitCard->arg_id . '_doc' . $i . '.' . $req->arg_documents[$i]->extension();
            $documents = array_push($arr, $filename);
            $req->file('arg_documents')[$i]->storeAs('public/credit_card_documents', $filename, 'local');
        }
        $documents = json_encode($arr);

        DebitCard::where('id', '=', $debitCard->id)->update([
            'arg_fname' => $req->arg_fname,
            'arg_midname' => $req->arg_midname,
            'arg_surname' => $req->arg_surname,
            'arg_email'  => $req->arg_email,
            'arg_mobile' => $req->arg_mobile,
            'arg_dob' => Carbon::createFromFormat('Y-m-d', $req->arg_dob)->format('d/m/Y'),
            'arg_ifsc' => strtoupper($req->arg_ifsc),
            'arg_bank' => $req->arg_bank,
            'arg_branch' => $req->arg_branch,
            'arg_account' => $req->arg_account,
            'arg_confirm_account' => $req->arg_confirm_account,
            'arg_account_type' => $req->arg_account_type,
            'arg_card_type' => implode(',', $req->arg_card_type),
            'arg_service_type' => implode(',', $req->arg_service_type),
            'arg_document' => $documents,
            'arg_address_line_1' => $req->arg_address_line_1,
            'arg_address_line_2' => $req->arg_address_line_2,
            'arg_country' => $req->arg_country,
            'arg_state' => $req->arg_state,
            'arg_city' => $req->arg_city,
            'arg_pincode' => $req->arg_pincode,
        ]);

        return redirect(route('debit_card.index'))->with('success', 'Application Details has been added successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DebitCard $debitCard)
    {
        //
    }
}
