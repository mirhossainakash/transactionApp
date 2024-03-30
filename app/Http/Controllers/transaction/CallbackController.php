<?php

namespace App\Http\Controllers\transaction;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

class CallbackController extends Controller
{
    public function updateTransaction(Request $request, $transaction_id)
    {
        // Implement logic for updating transaction record
        $transaction = Transaction::findOrFail($transaction_id);
        $transaction->status = $request->status;
        $transaction->save();

        return response()->json(['message' => 'Transaction updated successfully']);
    }
}
