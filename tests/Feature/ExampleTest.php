<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * Test
     */
    public function test_application(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}