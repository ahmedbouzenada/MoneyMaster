<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDebtRequest;
use App\Http\Requests\UpdateDebtRequest;
use App\Http\Resources\ClientResource;
use App\Http\Resources\DebtResource;
use App\Models\Client;
use App\Models\Debt;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Inertia\Inertia;

class DebtController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $debts = DebtResource::collection(Debt::paginate(10));
        return Inertia::render('Debts/Index', compact('debts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $client = Client::findOrfail($request->input('client_id'));
        $client = ClientResource::make($client);
        return Inertia::render('Debts/Create', compact('client'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDebtRequest $request)
    {
        $debt_data = array_merge($request->validated(), ['reference_number' => Str::uuid()]);
        Debt::create($debt_data);
        return to_route('clients.show', $request->input('client_id'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Debt $debt)
    {
        $debt = DebtResource::make($debt);
        return Inertia::render('Debts/Show', compact('debt'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Debt $debt)
    {
        return view('debts.edit', compact('debt'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDebtRequest $request, Debt $debt)
    {
        $debt->update($request->validated());
        return redirect()->route('clients.show', $request->client_id)->with('success', 'Debt updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Debt $debt)
    {
        $client = $debt->client;
        $debt->delete();
        return redirect()->route('clients.show', $client)->with('success', 'Debt deleted successfully');
    }
}
