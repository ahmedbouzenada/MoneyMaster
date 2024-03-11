<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDebtRequest;
use App\Http\Requests\UpdateDebtRequest;
use App\Models\Client;
use App\Models\Debt;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DebtController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $debts = Debt::whereHas(
            'client', function ($query) use ($search) {
            $query->where('firstname', 'like', $search . '%')
                ->orWhere('lastname', 'like', $search . '%');
        }
        )
            ->orderByDesc('date')
            ->paginate(10);
        return view('debts.index', compact('debts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(\Illuminate\Http\Request $request)
    {
        $client = Client::findOrfail($request->input('client_id'));
        return view('debts.create', compact('client'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDebtRequest $request)
    {
        $debt_data = array_merge($request->validated(), ['reference_number' => Str::uuid()]);
        Debt::create($debt_data);
        return redirect()->route('clients.show', $request->client_id)->with('success', 'Deby created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Debt $debt)
    {
        return view('debts.show', compact('debt'));
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
