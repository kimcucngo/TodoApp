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

        $response = $this->getJson('api/tasks');
        
        $response->assertOk();
    }
    public function test_register(): void
    {
        $data = [
            'title'=>'test_register1'
        ];

        $response = $this->postJson('api/tasks',$data);

        $response->assertStatus(201);
        
        $response->assertCreated()
                 ->assertJsonFragment($data);
    }
    public function test_update(): void
    {
        $task = Task::factory() -> create();
        $task -> title = 'charge';      
        $response = $this -> patchJson('api/task/'.$task->id,$task->toArray());
       
        $response->assertStatus(200);
    }
    public function test_delete(): void
    {
        $task = Task::factory()->create();

        $response = $this->deleteJson('api/task/'.$task->id);
        
        $response 
            ->assertStatus(200);
    }
}