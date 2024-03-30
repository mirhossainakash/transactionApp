<?php

namespace Tests\Feature;

use App\Models\Transaction;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Tests\TestCase;

class CallbackControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test updating transaction record with given status.
     *
     * @return void
     */
    public function testUpdatesTransactionRecordWithGivenStatus()
    {
        // Create a mock transaction
        $transaction = Transaction::factory()->create();

        // Make a request to the callback API endpoint
        $response = $this->put('/api/callback', [
            'transaction_id' => $transaction->id,
            'status' => 'accepted',
        ]);

        // Assert that the response is successful
        $response->assertStatus(Response::HTTP_OK);

        // Assert that the transaction record was updated with the given status
        $this->assertDatabaseHas('transactions', [
            'id' => $transaction->id,
            'status' => 'accepted',
        ]);
    }
}
