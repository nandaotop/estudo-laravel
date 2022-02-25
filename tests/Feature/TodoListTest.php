<?php

namespace Tests\Feature;

use App\Models\TodoList;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TodoListTest extends TestCase
{
    use RefreshDatabase; // da refresh toda vez que uso create

    public function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub

        $this->withoutExceptionHandling();  // brings me the exact errors
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        TodoList::factory()->count(2)->create(['name' => 'my list']);

        $response = $this->getJson(route('todo-list.index'));

        $this->assertEquals(2, count($response->json()));
        $this->assertEquals('my list', $response->json()[0]['name']);
    }

    /**
     * @return void
     */
    public function test_fetch_single_todo_list()
    {
        $todoList = TodoList::factory()->create();

        $response = $this->getJson(route('todo-list.show', $todoList));

        $response->assertStatus(200);
        $this->assertEquals($todoList->name, $response['name']);
    }
}
