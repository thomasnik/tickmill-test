<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Client;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with('client')->paginate(10);
        return response()->json($transactions);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'transaction_date' => 'required|date',
            'amount' => 'required|numeric|min:0.01',
        ]);

        $transaction = Transaction::create($validatedData);

        return response()->json($transaction, 201);
    }

    public function update(Request $request, $id)
    {
        $transaction = Transaction::findOrFail($id);

        $validatedData = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'transaction_date' => 'required|date',
            'amount' => 'required|numeric|min:0.01',
        ]);

        $transaction->update($validatedData);

        return response()->json($transaction);
    }

    public function destroy($id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->delete();

        return response()->json(['message' => 'Transaction deleted successfully']);
    }
}
