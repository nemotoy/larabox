<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Config;
use App\Models\User;

class BookTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testFindBooks()
    {
        User::factory()->create();
        $response = $this->get('api/book/lists');

        $response
            ->assertStatus(200);
            // TODO
            // ->assertExactJson([
            //     'books' => [
            //         ['id' => '1', 'title' => 'aaa'],
            //         // ['id' => '2', 'title' => 'bbb'],
            //         // ['id' => '3', 'title' => 'ccc'],
            //     ]
            // ]);
    }
}
