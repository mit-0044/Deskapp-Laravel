<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTransactionTypeRequest;
use App\Http\Requests\UpdateTransactionTypeRequest;
use App\Models\TransactionType;

class TransactionTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactionTypes = TransactionType::all();
        return view('transaction_types.index', compact('transactionTypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('transaction_types.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTransactionTypeRequest $request)
    {
        TransactionType::create([
            'name' => $request->name,
        ]);
        $transactionTypes = TransactionType::all();
        return view('transaction_types.index', compact('transactionTypes'));
    }

    /**
     * Display the specified resource.
     */
    public function show(TransactionType $transactionType)
    {
        $transactionTypes = TransactionType::where('id', $transactionType->id)->get();
        return view('transaction_types.show', compact('transactionTypes'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TransactionType $transactionType)
    {
        $transactionTypes = TransactionType::where('id', $transactionType->id)->get();
        return view('transaction_types.edit', compact('transactionTypes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTransactionTypeRequest $request, TransactionType $transactionType)
    {
        TransactionType::where('id', $transactionType->id)->update([
            'name' => $request->name,
        ]);
        $transactionTypes = TransactionType::all();
        return redirect(route('transaction-type.index', ['transactionTypes' => $transactionTypes]))->with('update', 'Transaction type updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TransactionType $transactionType)
    {
        TransactionType::destroy($transactionType->id);
        $transactionTypes = TransactionType::all();
        return redirect(route('transaction-type.index', ['transactionTypes' => $transactionTypes]))->with('delete', 'Transaction type deleted successfully.');
    }
}