<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $transaction = Transaction::paginate(10);
        return view('transactions.index', compact('transaction'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('transactions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'amount' => 'required|numeric|min:50000|max:10000000000',
            'type' => 'required',
            'category' => 'required',
            'notes' => 'nullable|string'
        ]);

        $transaction = Transaction::create([
            'amount' => $validated['amount'],
            'type' => $validated['type'],
            'category' => $validated['category'],
            'notes' => $validated['notes']
        ]);

        return redirect()->route('transactions.index')->with('success', 'Transaction successfully added.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        return view('transactions.show', compact('transaction'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        return view('transactions.edit', compact('transaction'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $transaction)
    {
        $validated = $request->validate([
            'amount' => 'required|numeric|min:50000|max:10000000000',
            'type' => 'required',
            'category' => 'required',
            'notes' => 'nullable|string'
        ]);

        $transaction = Transaction::create([
            'amount' => $validated['amount'],
            'type' => $validated['type'],
            'category' => $validated['category'],
            'notes' => $validated['notes']
        ]);

        return redirect()->route('transactions.index')->with('success', 'Transaction successfully updated.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        $transaction->delete();
        return redirect()->route('transactions.index')->with('success', 'Transaction deleted successfully.');

    }
}
