<?php

namespace App\Http\Controllers;

use App\Models\Credit;
use App\Models\Loan;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function create()
    {
        $credits = Credit::where('remaining_balance', '>', 0)->get();
        return view('payments.create', compact('credits'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'credit_id' => 'required|exists:credits,id',
            'amount' => 'required|numeric|min:1',
        ]);

        $credit = Credit::find($request->credit_id);
        Payment::applyPayment($credit, $request->amount);

        Payment::create([
            'credit_id' => $request->credit_id,
            'amount' => $request->amount,
        ]);

        return redirect()->route('credits.index')->with('success', 'Плащането е успешно.');
    }
}
