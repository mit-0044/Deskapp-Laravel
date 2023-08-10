<?php

namespace App\Http\Controllers;

use App\Models\ClientStatus;
use App\Http\Requests\StoreClientStatusRequest;
use App\Http\Requests\UpdateClientStatusRequest;

class ClientStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientStatus = ClientStatus::all();
        return view('client_statuses.index', compact('clientStatus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('client_statuses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreClientStatusRequest $request)
    {
        ClientStatus::create([
            'name' => $request->name,
        ]);
        $clientStatus = ClientStatus::get();
        return redirect()->route('client-status.index', ['clientStatus' => $clientStatus]);
    }

    /**
     * Display the specified resource.
     */
    public function show(ClientStatus $clientStatus)
    {
        $clientStatus = ClientStatus::where('id', $clientStatus->id)->get();
        return view('client_statuses.show', compact('clientStatus'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ClientStatus $clientStatus)
    {
        $clientStatus = ClientStatus::where('id', $clientStatus->id)->get();
        return view('client_statuses.edit', compact('clientStatus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClientStatusRequest $request, ClientStatus $clientStatus)
    {
        $clientStatus = ClientStatus::where('id', $clientStatus->id)->update([
            'name' => $request->name,
        ]);
        $clientStatus = ClientStatus::get();
        return redirect()->route('client-status.index', ['clientStatus' => $clientStatus]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ClientStatus $clientStatus)
    {
        //
    }
}
