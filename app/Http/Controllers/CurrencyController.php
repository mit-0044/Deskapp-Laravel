<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use App\Http\Requests\StoreCurrencyRequest;
use App\Http\Requests\UpdateCurrencyRequest;

class CurrencyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $currencies = Currency::all();
        return view('currencies.index', compact('currencies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('currencies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCurrencyRequest $request)
    {
    }

    /**
     * Display the specified resource.
     */
    public function show(Currency $currency)
    {
        $currencies = Currency::where('id', '=', $currency->id)->get();
        return view('currencies.show', compact(['currencies']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Currency $currency)
    {
        $currencies = Currency::where('id', '=', $currency->id)->get();
        return view('currencies.edit', compact(['currencies']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCurrencyRequest $request, Currency $currency)
    {
        if ($request->main_currency == null) {
            Currency::where('id', $currency->id)->update([
                'name' => $request->name,
                'code' => $request->code,
            ]);
        } else {
            Currency::where('id', $currency->id)->update([
                'name' => $request->name,
                'code' => $request->code,
                'main_currency' => $request->main_currency,
            ]);
        }
        $currencies = Currency::all();
        return to_route('currency.index', ['currencies'=>$currencies]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Currency $currency)
    {
        //
    }
}
