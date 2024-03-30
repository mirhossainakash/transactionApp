<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TransactionControllerTest extends TestCase
{
    /** @test */
    public function it_creates_transaction_and_returns_transaction_id()
    {
        $requestData = [
            'user_id' => 1,
            'amount' => 100,
        ];

        $response = $this->postJson('/api/transaction', $requestData);

        $response->assertStatus(201)
                 ->assertJsonStructure(['transaction_id']);
    }
}
