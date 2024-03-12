<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePaymentRequest;
use App\Http\Requests\UpdatePaymentRequest;
use App\Models\Client;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $sortColumn = $request->input('sort', 'date');
        $sortOrder = $request->input('order', 'desc');
        $payments = Payment::whereHas(
            'client', function ($query) use ($search) {
            $query->where('firstname', 'like', $search . '%')
                ->orWhere('lastname', 'like', $search . '%');
        }
        )
            ->orderBy($sortColumn, $sortOrder)
            ->paginate(15);
        return view('payments.index', compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $client = Client::findOrfail($request->input('client_id'));
        return view('payments.create', compact('client'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePaymentRequest $request)
    {
        $payment_data = array_merge($request->validated(), ['reference_number' => Str::uuid()]);
        Payment::create($payment_data);
        return redirect()->route('clients.show', $request->client_id)->with('success', 'Payment created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Payment $payment)
    {
//        $payment->date = Carbon::parse($payment->date)->format('d F Y');
        return view('payments.show', compact('payment'));
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
        return redirect()->route('clients.show', $client)->with('success', 'Payment deleted successfully');
    }
}
