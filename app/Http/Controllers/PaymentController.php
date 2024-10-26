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

        // Проверка дали сумата на плащането е по-малка от месечната вноска
        if ($request->amount < $credit->monthly_payment) {
            return redirect()->back()->withErrors(['amount' => 'Сумата на плащането не може да бъде по-малка от месечната вноска от ' . number_format($credit->monthly_payment, 2) . ' лв.']);
        }

        // Проверка дали сумата на плащането е по-голяма от остатъчната сума
        $amountToPay = $request->amount;
        if ($request->amount > $credit->remaining_balance) {
            $amountToPay = $credit->remaining_balance;
            $message = 'Сумата на плащането е по-голяма от остатъчната сума. Платени са само ' . number_format($amountToPay, 2) . ' лв за кредит с код ' . $credit->credit_id . '.';
        } else {
            $message = 'Плащането от ' . number_format($amountToPay, 2) . ' лв беше успешно извършено за кредит с код ' . $credit->credit_id . '.';
        }

        // Изпълнение на плащането
        Payment::applyPayment($credit, $amountToPay);

        Payment::create([
            'credit_id' => $request->credit_id,
            'amount' => $amountToPay,
        ]);

        return redirect()->route('credits.index')->with('success', $message);
    }
}
