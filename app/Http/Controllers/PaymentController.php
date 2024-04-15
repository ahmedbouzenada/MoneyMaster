<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePaymentRequest;
use App\Http\Requests\UpdatePaymentRequest;
use App\Http\Resources\ClientResource;
use App\Http\Resources\PaymentResource;
use App\Models\Client;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Inertia\Inertia;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payments = PaymentResource::collection(Payment::paginate(10));
        return Inertia::render('Payments/Index', compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $client = Client::findOrfail($request->input('client_id'));
        $client = ClientResource::make($client);
        return Inertia::render('Payments/Create', compact('client'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePaymentRequest $request)
    {
        $payment_data = array_merge($request->validated(), ['reference_number' => Str::uuid()]);
        Payment::create($payment_data);
        return to_route('clients.show', $request->input('client_id'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Payment $payment)
    {
        $payment = PaymentResource::make($payment);
        return Inertia::render('Payments/Show', compact('payment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payment $payment)
    {
        return view('payments.edit', compact('payment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePaymentRequest $request, Payment $payment)
    {
        $payment->update($request->validated());
        return redirect()->route('clients.show', $request->client_id)->with('success', 'Payment updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment $payment)
    {
        $client = $payment->client;
        $payment->delete();
        return to_route('clients.show', $client->id)->with('success', 'Payment deleted successfully.');
    }
}
