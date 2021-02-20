<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;
use App\Http\Requests\ExampleRequest;

class ExampleTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @dataProvider validationProvider
     * @return void
     */
    public function testValidation($inData, $outFail, $outMessage)
    {
        $request = new ExampleRequest();
        $rules = $request->rules();
        $messages = $request->messages();
        dump($rules, $messages);
        $validator = Validator::make($inData, $rules, $messages);
        $result = $validator->fails();
        $this->assertEquals($outFail, $result);
        $messages = $validator->errors()->getMessages();
        $this->assertEquals($outMessage, $messages);
    }

    public function validationProvider()
    {
        return [
            'success' => [
                [
                    'id' => 1,
                    'name' => 'aaa',
                    'email' => 'aaaa@example.com',
                ],
                false,
                [],
            ],
        ];
    }
}
