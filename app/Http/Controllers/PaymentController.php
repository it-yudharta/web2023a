<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class PaymentController extends Controller
{
    public function index(Request $request, $memberId)
    {
        $amount = config('app.payment_amount');
        $start = config('app.session_start_date');
        $today = Carbon::now();
        $diff = $today->diffInWeeks($start);

        $totalAmount = $amount * $diff;

        $payments = Payment::where('member_id', $memberId)->get();

        $totalPayment = $payments->sum('amount');
        $credit = $totalAmount - $totalPayment;

        return view('payment.index', [
            'payments' => $payments,
            'member_id' => $memberId,
            'total_amount' => $totalAmount,
            'total_payment' => $totalPayment,
            'credit' => $credit,
        ]);
    }

    public function create(Request $request, $memberId)
    {
        $request->validate([
            'payment_date' => 'required|date',
            'amount' => 'required|integer',
        ]);

        $payment = new Payment;
        $payment->member_id = $memberId;
        $payment->payment_date = $request->payment_date;
        $payment->amount = $request->amount;
        $payment->save();

        return redirect('/payments/' . $memberId);
    }
}
