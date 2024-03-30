<?php

namespace App\Http\Controllers\transaction;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function doTransaction(Request $request)
    {
        // Implement logic for handling transaction and calling mock API
        $mockResponse = $this->callMockAPI();

        $transaction = new Transaction();
        $transaction->user_id = $request->user_id;
        $transaction->amount = $request->amount;
        $transaction->status = $mockResponse['status'];
        $transaction->save();

        return response()->json(['transaction_id' => $transaction->id], 201)->header('Cache-Control', 'no-store');
    }

    private function callMockAPI()
    {
        // Simulate calling the mock API
        // For demo purposes, just return a random response
        $statuses = ['accepted', 'failed'];
        return ['status' => $statuses[array_rand($statuses)]];
    }
}
