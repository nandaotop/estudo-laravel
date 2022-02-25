<?php

namespace Tests\Feature;

use App\Models\TodoList;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TodoListTest extends TestCase
{
    use RefreshDatabase; // da refresh toda vez que uso create

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->withoutExceptionHandling();  // brings me the exact errors

        TodoList::create(['name' => 'my list']);

        $response = $this->getJson(route('todo-list.index'));

        $this->assertEquals(1, count($response->json()));
    }
}
