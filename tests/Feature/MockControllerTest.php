<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class MockControllerTest extends TestCase
{
    /** @test */
    public function it_returns_accepted_response_when_mock_status_is_set_to_accepted()
    {
        $response = $this->withHeaders(['X-Mock-Status' => 'accepted'])->postJson('/api/mock');

        $response->assertStatus(200)
                 ->assertJson(['status' => 'accepted']);
    }

    /** @test */
    public function it_returns_failed_response_when_mock_status_is_set_to_failed()
    {
        $response = $this->withHeaders(['X-Mock-Status' => 'failed'])->postJson('/api/mock');

        $response->assertStatus(400)
                 ->assertJson(['status' => 'failed']);
    }

    /** @test */
    public function it_returns_error_when_mock_status_is_invalid()
    {
        $response = $this->withHeaders(['X-Mock-Status' => 'invalid'])->postJson('/api/mock');

        $response->assertStatus(400)
                 ->assertJson(['error' => 'Invalid X-Mock-Status header']);
    }
}
