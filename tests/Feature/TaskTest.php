<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Task;

class TaskTest extends TestCase
{
    use RefreshDatabase;
    /**
     * Test
     */
    public function test_application_ex(): void
    {
        $tasks = Task::factory()->count(10)->create();

        // dd($tasks->toArray());

        $response = $this->getJson('api/tasks');

        // dd($response->json());
        
        $response->assertStatus(200)
                 ->assertjsonCount($tasks->count());
    }
}