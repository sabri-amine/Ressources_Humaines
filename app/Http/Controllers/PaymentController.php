<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $validatedData = $request->validate([
            'FullName' => 'required|string|max:255',
            'Email' => 'required|string|email|unique:payments,Email',
            'Hotel' => 'required|string|max:255',
            'NameOnCard' => 'required|string|max:255',
            'CreditCardNumber' => 'required|string|unique:payments,CreditCardNumber',
            'ExpMonth' => 'required|integer|min:1|max:12',
            'ExpYear' => 'required|integer|min:' . date('Y') . '|max:' . (date('Y') + 10),
            'CVV' => 'required|string|max:4',
        ]);

        $payment = Payment::create($validatedData);
        // $request->session()->flash('success', 'Paiement créé avec succès');

        return to_route('userHotels.show')->with('success', 'Paiement créé avec succès');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
