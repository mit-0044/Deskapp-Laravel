<?php

namespace App\Http\Controllers;

use App\Models\IncomeSource;
use App\Http\Requests\StoreIncomeSourceRequest;
use App\Http\Requests\UpdateIncomeSourceRequest;

class IncomeSourceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $incomeSources = IncomeSource::all();
        return view('income_sources.index', compact('incomeSources'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('income_sources.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreIncomeSourceRequest $request)
    {
        IncomeSource::create([
            'name' => $request->name,
            'fee_percent' => $request->fee_percent
        ]);
        $incomeSources = IncomeSource::all();
        return redirect()->route('income-source.index', ['incomeSources' => $incomeSources]);
    }

    /**
     * Display the specified resource.
     */
    public function show(IncomeSource $incomeSource)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(IncomeSource $incomeSource)
    {
        $incomeSources = IncomeSource::where('id', $incomeSource->id)->get();
        return view('income_sources.edit', compact('incomeSources'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateIncomeSourceRequest $request, IncomeSource $incomeSource)
    {
        $incomeSources = IncomeSource::where('id', $incomeSource->id)->update([
            'name' => $request->name,
            'fee_percent' => $request->fee_percent
        ]);
        $incomeSources = IncomeSource::all();
        return redirect()->route('income-source.index', ['incomeSources' => $incomeSources]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(IncomeSource $incomeSource)
    {
        //
    }
}
