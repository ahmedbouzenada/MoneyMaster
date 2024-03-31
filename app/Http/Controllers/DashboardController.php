<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Debt;
use App\Models\Payment;
use Illuminate\Support\Facades\DB;
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
        $averageDailyPayments = DB::table('payments')
            ->select(DB::raw('AVG(daily_sum) AS per_day'))
            ->from(function ($query) {
                $query->select(DB::raw('SUM(amount) AS daily_sum'))
                    ->from('payments')
                    ->groupBy(DB::raw('DATE(date)'));
            }, 'daily_payments')
            ->first();
        $averageDailyDebts = DB::table('debts')
            ->select(DB::raw('AVG(daily_sum) AS per_day'))
            ->from(function ($query) {
                $query->select(DB::raw('SUM(amount) AS daily_sum'))
                    ->from('debts')
                    ->groupBy(DB::raw('DATE(date)'));
            }, 'daily_debts')
            ->first();

        return Inertia::render('Dashboard', [
            'totalClients' => $totalClients,
            'totalPayments' => $totalPayments,
            'totalDebts' => $totalDebts,
            'totalMoney' => $totalMoney,
            'balance' => $balance,
            'averageDailyPayments' => floatval($averageDailyPayments->per_day),
            'averageDailyDebts' => floatval($averageDailyDebts->per_day)
        ]);
    }
}
