<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    public function index()
    {
        $loans = Loan::all();
        //return response()->json($loans);
        return view('loans.index', compact('loans'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'borrower_name' => 'required|string|max:255',
            'amount' => 'required|numeric|min:1|max:80000',
            'term' => 'required|integer|min:3|max:120',
        ]);

        // Calculate monthly payment based on loan amount, interest rate, and term.
        $interestRate = 7.9 / 100 / 12;
        $monthlyPayment = $validatedData['amount'] * $interestRate /
            (1 - pow(1 + $interestRate, -$validatedData['term']));

        // Generate unique loan ID
        $loanId = 'LN' . str_pad(Loan::max('id') + 1, 7, '0', STR_PAD_LEFT);

        // Check if borrower has loans totaling less than 80,000 BGN
        $totalLoans = Loan::where('borrower_name', $validatedData['borrower_name'])->sum('amount');
        if ($totalLoans + $validatedData['amount'] > 80000) {
            return response()->json(['error' => 'Loan limit exceeded for this borrower.'], 400);
        }

        // Create the loan
        $loan = Loan::create([
            'loan_id' => $loanId,
            'borrower_name' => $validatedData['borrower_name'],
            'amount' => $validatedData['amount'],
            'term' => $validatedData['term'],
            'monthly_payment' => $monthlyPayment,
            'remaining_balance' => $validatedData['amount'],
        ]);

        return response()->json($loan, 201);
    }
}
