<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class PaymentController extends Controller
{
    public function index()
    {
        $amount = config('app.payment_amount');
        $start = config('app.session_start_date');
        $today = Carbon::now();
        $diff = $today->diffInWeeks($start);

        return [
            'start' => $start,
            'today' => $today,
            'diff' => $diff,
            'amount' => $diff * $amount,
        ];
    }
}
