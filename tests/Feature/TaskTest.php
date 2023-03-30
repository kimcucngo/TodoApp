<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
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
        
        $response->assertOk();
                //  ->assertjsonCount($tasks->count());
    }
    public function test_register(): void
    {
        $data = [
            'title'=>'test_register1'
        ];

        $response = $this->postJson('api/tasks',$data);

        $response->assertStatus(201);

        // dd($response->json());
        
        $response->assertCreated()
                 ->assertJsonFragment($data);
    }
    public function test_update(Request $request,): void
    {
        $task = Task::factory() -> create();
        $task -> title = 'change';  
        
        $response = $this -> patchJson("api/Task/{$task -> id}",$task -> toArray());

        dd($response -> Json());
    //     $response -> assertCrated()
    //               -> assertJsonFragment($data);
    }
    // public function test_delete(): void
    // {
    //     $task = Task::factory()->count(10)->create();

    //     $response = $this -> deleteJson("api/tasks/1");
        
    //     $response 
    //         -> assertOk();
    // }
}