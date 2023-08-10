<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Models\Client;
use App\Models\ClientStatus;
use App\Models\Project;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::all();
        return view('clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clients = Client::get();
        $country = DB::table('country')->get();
        $clientStatus = ClientStatus::all();
        return view('clients.create', compact(['country', 'clients', 'clientStatus']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreClientRequest $request)
    {
        Client::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'company' => $request->company,
            'email' => $request->email,
            'phone' => $request->phone,
            'website' => $request->website,
            'skype' => $request->skype,
            'country' => $request->country,
            'client_status' => $request->client_status,
        ]);
        $clients = Client::all();
        return redirect()->route('client.index', ['clients' => $clients]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        $clients = Client::all();
        $country = DB::table('country')->where('countryid', $clients[0]->country)->get();
        $client_status = ClientStatus::where('id', $clients[0]->client_status_id)->get();
        return view('clients.show', compact(['clients', 'client_status', 'country']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        $clients = Client::where('id', $client->id)->get();
        $clientStatus = ClientStatus::get();
        $country = DB::table('country')->get();
        return view('clients.edit', compact(['country', 'clients', 'clientStatus']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClientRequest $request, Client $client)
    {
        Client::where('id', $client->id)->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'company' => $request->company,
            'email' => $request->email,
            'phone' => $request->phone,
            'website' => $request->website,
            'skype' => $request->skype,
            'country' => $request->country,
            'client_status' => $request->client_status,
        ]);
        $clients = Client::all();
        return redirect(route('client.index', ['clients' => $clients]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        Client::destroy($client->id);
        $clients = Client::all();
        return redirect()->route('client.index', ['clients' => $clients])->with('success', 'Client Deleted successfully.');

    }

    /**
     * Show the report of client.
     */
    public function report(Request $request)
    {
        $tr = Transaction::with('project')
            ->with('transaction_type')
            ->with('income_source')
            ->with('currency')
            ->orderBy('transaction_date', 'desc');

        if ($request->has('project')) {
            $tr->where('project_id', $request->project);
        }
        $transactions = $tr->get();

        $entries = [];
        foreach ($transactions as $row) {
            if ($row->transaction_date != null) {
                $date = $row->transaction_date;
                if (!isset($entries[$date])) {
                    $entries[$date] = [];
                }
                $currency = $row->currency->code;
                if (!isset($entries[$date][$currency])) {
                    $entries[$date][$currency] = [
                        'income' => 0,
                        'expenses' => 0,
                        'fees' => 0,
                        'total' => 0,
                    ];
                }
                $income = 0;
                $expenses = 0;
                $fees = 0;
                if ($row->amount > 0) {
                    $income += $row->amount;
                } else {
                    $expenses += $row->amount;
                }
                if (!is_null($row->income_source->fee_percent)) {
                    $fees = $row->amount * ($row->income_source->fee_percent / 100);
                }

                $total = $income + $expenses - $fees;
                $entries[$date][$currency]['income'] += $income;
                $entries[$date][$currency]['expenses'] += $expenses;
                $entries[$date][$currency]['fees'] += $fees;
                $entries[$date][$currency]['total'] += $total;
            }
        }
        $projects = Project::get();
        if ($request->has('project')) {
            $currentProject = $request->get('project');
        } else {
            $currentProject = '';
        }
        return view('clients.report', compact(['entries', 'projects', 'currentProject']));
    }

}
