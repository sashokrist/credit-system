<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Credit extends Model
{
    protected $fillable = ['credit_id', 'borrower_name', 'amount', 'term_months', 'monthly_payment', 'remaining_balance'];

    public static function calculateMonthlyPayment($totalAmountWithInterest, $termMonths, $interestRate = 7.9)
    {
        $monthlyRate = ($interestRate / 100) / 12;
        return ($totalAmountWithInterest * $monthlyRate) / (1 - pow(1 + $monthlyRate, -$termMonths));
    }

}
