<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = ['credit_id', 'amount'];

    public static function applyPayment(Credit $credit, $amount)
    {
        $remaining = $credit->remaining_balance;
        if ($amount > $remaining) {
            $amount = $remaining;
        }
        $credit->remaining_balance -= $amount;
        $credit->save();
    }
}
