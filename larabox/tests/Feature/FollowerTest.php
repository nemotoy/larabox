<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FollowerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testFindFollowers()
    {
        $response = $this->get('/followers');

        $response
            ->assertStatus(200)
            ->assertExactJson([
                'followers' => [
                    ['id' => '1', 'name' => 'aaa'],
                    ['id' => '2', 'name' => 'bbb'],
                    ['id' => '3', 'name' => 'bbb'],
                ]
            ]);
    }
}
