<?php

namespace App\Http\Controllers\transaction;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MockController extends Controller
{
    public function mockResponse(Request $request)
    {
        // Implement mock response logic here
        $status = $request->header('X-Mock-Status');

        if ($status === 'accepted') {
            return response()->json(['status' => 'accepted']);
        } elseif ($status === 'failed') {
            return response()->json(['status' => 'failed'], 400);
        } else {
            return response()->json(['error' => 'Invalid X-Mock-Status header'], 400);
        }
    }
}
