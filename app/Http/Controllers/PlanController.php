<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePlanRequest;
use App\Http\Requests\UpdatePlanRequest;
use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $plans = Plan::get();
        return view('plans.plans', compact('plans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('plans.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePlanRequest $request)
    {
        Plan::create([
            'name' => ucfirst($request->name),
            'slug' => strtolower($request->name),
            'stripe_plan' => $request->stripe_plan,
            'price' => $request->price,
            'time_period' => $request->time_period,
            'description' => $request->description,
        ]);
        $plans = Plan::get();
        return redirect(route('plan.index', ['plans' => $plans]));
    }

    /**
     * Display the specified resource.
     */
    public function show(Plan $plan, Request $request)
    {
        $intent = auth()->user()->createSetupIntent();
        return view("plans.subscription", compact(["plan", "intent"]));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Plan $plan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePlanRequest $request, Plan $plan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Plan $plan)
    {
        //
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function subscription(Request $request)
    {
        $plan = Plan::find($request->plan);
        $subscription = $request->user()->newSubscription($request->plan, $plan->stripe_plan)
            ->create(request('  stripeToken'));
        return view("subscription_success");
    }
}
