<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Debt;
use App\Models\Payment;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        $totalClients = Client::count();
        $totalPayments = floatval(Payment::select('amount')->sum('amount'));
        $totalDebts = floatval(Debt::select('amount')->sum('amount'));
        $totalMoney = $totalDebts + $totalPayments;
        $balance = $totalPayments - $totalDebts;
        return Inertia::render('Dashboard', [
            'totalClients' => $totalClients,
            'totalPayments' => $totalPayments,
            'totalDebts' => $totalDebts,
            'totalMoney' => $totalMoney,
            'balance' => $balance,
        ]);
    }
}
