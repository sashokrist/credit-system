<?php

namespace App\Http\Controllers;

use App\Models\Credit;
use Illuminate\Http\Request;

class CreditController extends Controller
{
    public function index()
    {
        $credits = Credit::orderBy('created_at', 'desc')->paginate(5);
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

        $totalCredits = Credit::where('borrower_name', auth()->user()->name)->sum('amount');

        $annualInterestRate = 7.9;
        $termYears = $request->term_months / 12;
        $totalAmountWithInterest = $request->amount * (1 + ($annualInterestRate / 100) * $termYears);

        if ($totalCredits + $totalAmountWithInterest > 80000) {
            return redirect()->back()->withErrors(['amount' => 'Общата стойност на кредитите не може да надвишава 80,000 лв.']);
        }

        $creditId = str_pad(Credit::max('id') + 1, 7, '0', STR_PAD_LEFT);

        $monthlyPayment = Credit::calculateMonthlyPayment($totalAmountWithInterest, $request->term_months);

        Credit::create([
            'credit_id' => $creditId,
            'borrower_name' => auth()->user()->name,
            'amount' => $totalAmountWithInterest,
            'term_months' => $request->term_months,
            'monthly_payment' => $monthlyPayment,
            'remaining_balance' => $totalAmountWithInterest,
        ]);

        return redirect()->route('credits.index')->with('success', 'Кредитът беше успешно създаден.');
    }
}
