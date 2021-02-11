<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BookTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testFindBook()
    {
        $response = $this->get('/book/lists');

        $response
            ->assertStatus(200)
            ->assertExactJson([
                'books' => [
                    ['id' => '1', 'title' => 'aaa'],
                    ['id' => '2', 'title' => 'bbb'],
                    ['id' => '3', 'title' => 'bbb'],
                ]
            ]);
    }
}
