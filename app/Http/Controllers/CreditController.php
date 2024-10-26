<?php

namespace App\Http\Controllers;

use App\Models\Credit;
use Illuminate\Http\Request;

class CreditController extends Controller
{
    public function index()
    {
        $credits = Credit::all();
        return view('credits.index', compact('credits'));
    }

    public function create()
    {
        return view('credits.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:1|max:80000',
            'term_months' => 'required|integer|min:3|max:120',
        ]);

        // Изчисляване на общата сума с лихва
        $annualInterestRate = 7.9; // Годишен лихвен процент
        $termYears = $request->term_months / 12; // Преобразуване на месеци в години
        $totalAmountWithInterest = $request->amount * (1 + ($annualInterestRate / 100) * $termYears);

        // Генериране на уникален идентификатор за кредита
        $creditId = str_pad(Credit::max('id') + 1, 7, '0', STR_PAD_LEFT);

        // Изчисляване на месечната вноска въз основа на общата сума с лихва
        $monthlyPayment = Credit::calculateMonthlyPayment($totalAmountWithInterest, $request->term_months);

        // Създаване на кредита
        Credit::create([
            'credit_id' => $creditId,
            'borrower_name' => auth()->user()->name,
            'amount' => $totalAmountWithInterest,
            'term_months' => $request->term_months,
            'monthly_payment' => $monthlyPayment,
            'remaining_balance' => $totalAmountWithInterest,
        ]);

        return redirect()->route('credits.index');
    }
}
