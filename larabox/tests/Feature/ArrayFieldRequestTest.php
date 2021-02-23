<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Validator;
use Tests\TestCase;
use App\Http\Requests\ArrayFieldRequest;

class ArrayFieldRequestTest extends TestCase
{
    /**
     * 
     * @dataProvider validationProvider
     * @return void
     */
    public function testValidation($inData, $outBool, $outMessage)
    {
        $request = new ArrayFieldRequest();
        $rules = $request->rules();
        $messages = $request->messages();
        $validator = Validator::make($inData, $rules, $messages);
        $result = $validator->fails();
        $this->assertEquals($outBool, !$result);
        $messages = $validator->errors()->getMessages();
        $this->assertEquals(json_encode($outMessage), json_encode($messages));
    }

    /**
     * @return array
     */
    public function validationProvider()
    {
        return [
            'success' => [
                [
                    'id' => 1,
                    'name' => 'aaa',
                    'email' => 'aaaa@example.com',
                    'dynamic' => [
                        'question' => 'aaa',
                        'question' => 'bbb',
                    ],
                ],
                true,
                [],
            ],
            '(fail) array field is not found' => [
                [
                    'id' => 1,
                    'name' => 'aaa',
                    'email' => 'aaaa@example.com',
                ],
                false,
                [
                    'dynamic.question' => ['The dynamic.question field is required.']
                ],
            ],
        ];
    }
}
