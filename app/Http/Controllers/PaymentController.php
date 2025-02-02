<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::with('sale')->get();
        return response()->json($payments);
    }

    public function store(Request $request)
    {
        $request->validate([
            'sale_id' => 'required|exists:sales,id',
            'payment_date' => 'required|date',
            'amount' => 'required|numeric|min:1',
        ]);

        $payment = Payment::create($request->all());

        return response()->json([
            'message' => 'Payment recorded successfully',
            'payment' => $payment
        ], 201);
    }

    public function show($id)
    {
        $payment = Payment::with('sale')->findOrFail($id);
        return response()->json($payment);
    }
}
