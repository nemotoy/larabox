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
     * FormRequestクラスのテスト
     * https://readouble.com/laravel/8.x/ja/validation.html#form-request-validation
     * - バリデーション
     * - メッセージ
     *
     * テスト方法
     * - FromRequestを継承したクラスのインスタンスを生成し、バリデーションルールとメッセージを取得する。
     * - Validatorインスタンスを作成する。上で取得した値とテストしたいデータを渡す。
     * - Validatorインスタンスを実行し、その結果を評価する。
     * 
     * @dataProvider validationProvider
     * @return void
     */
    public function testValidation($inData, $outFail, $outMessage)
    {
        $request = new ExampleRequest();
        $rules = $request->rules();
        $messages = $request->messages();
        $validator = Validator::make($inData, $rules, $messages);
        $result = $validator->fails();
        $this->assertEquals($outFail, $result);
        $messages = $validator->errors()->getMessages();
        $this->assertEquals(json_encode($outMessage), json_encode($messages)); // todo: 単純な配列の比較の場合失敗時に詳細結果を表示されないため、エンコーディングする。
    }

    /**
     * ExampleRequestクラステスト用のバリデーションプロバイダ
     * - テストケース名を追加し、データセット毎に識別できるようにする
     * - メッセージはresources/lang/en/validation.phpから。
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
                    'object_type' => 'typea',
                    'aid' => 1,
                ],
                false,
                [],
            ],
            'empty all fields' => [
                [],
                true,
                [
                    'id' => ['The id field is required.'],
                    'name' => ['The name field is required.'],
                    'email' => ['The email field is required.'],
                    'object_type' => ["The object type field is required."]
                ],
            ],
            'object_type does not exist' => [
                [
                    'id' => 1,
                    'name' => 'aaa',
                    'email' => 'aaaa@example.com',
                    'object_type' => 'invalid',
                    'aid' => 100,
                ],
                true,
                [
                    'object_type' => ["The selected object type is invalid."]
                ],
            ],
            'aid is not found' => [
                [
                    'id' => 1,
                    'name' => 'aaa',
                    'email' => 'aaaa@example.com',
                    'object_type' => 'typea',
                ],
                true,
                [
                    'aid' => ["The aid field is required when object type is typea."]
                ],
            ],
        ];
    }
}
