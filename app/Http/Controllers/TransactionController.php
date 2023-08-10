<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransactionRequest;
use App\Models\Currency;
use App\Models\IncomeSource;
use App\Models\Project;
use App\Models\Transaction;
use App\Models\TransactionType;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactions = Transaction::all();
        return view('transactions.index', compact(['transactions']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $projects = Project::get();
        $transaction_types = TransactionType::get();
        $income_sources = IncomeSource::get();
        $currencies = Currency::get();
        return view('transactions.create', compact(['projects', 'transaction_types', 'income_sources', 'currencies']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TransactionRequest $request)
    {
        Transaction::create($request->all());
        $transactions = Transaction::all();
        return redirect()->route('transaction.index', ['transactions' => $transactions]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        $transactions = Transaction::where('id', $transaction->id)->get();
        return view('transactions.show', compact(['transactions']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        $projects = Project::get();
        $transaction_types = TransactionType::get();
        $income_sources = IncomeSource::get();
        $currencies = Currency::get();
        $transactions = Transaction::where('id', '=', $transaction->id)->get();
        return view('transactions.edit', compact(['projects', 'transaction_types', 'income_sources', 'currencies', 'transactions']));
    }

    /**
     * Update the specified res ource in storage.
     */
    public function update(TransactionRequest $request, Transaction $transaction)
    {
        Transaction::where('id', $transaction->id)->update([
            'project_id' => $request->project_id,
            'transaction_type_id' => $request->transaction_type_id,
            'income_source_id' => $request->income_source_id,
            'amount' => $request->amount,
            'currency_id' => $request->currency_id,
            'transaction_date' => $request->transaction_date,
            'name' => $request->name,
            'description' => $request->description,
        ]);
        $transactions = Transaction::all();
        return redirect()->route('transaction.index', ['transactions' => $transactions])->with('update', 'Transaction updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
