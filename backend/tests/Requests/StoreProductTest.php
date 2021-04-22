<?php

namespace Tests\Requests;

use App\Http\Requests\StoreProduct;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class StoreProductTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     * フォームリクエストのバリデーションテスト
     */
    public function testExample(array $keys, array $values, bool $expect)
    {   
        //入力項目の配列（$keys）と値の配列($values)から、連想配列を生成する
        $dataList = [$keys => $values];
        // フォームリクエストのインスタンスをつくる
        $request = new StoreProduct();
        // インスタンスのルールを取得
        $rules = $request->rules();
        //Validatorファサードでバリデーターのインスタンスを取得、その際に入力情報とバリデーションルールを引数で渡す
        $validator = Validator::make($dataList, $rules);
        //入力情報がバリデーショルールを満たしている場合はtrue、満たしていな場合はfalseが返る
        $result = $validator->passes();
        //期待値($expect)と結果($result)を比較
        $this->assertEquals($expect, $result);
    }

    public function dataProductStore()
    {
        return [
            'OK' => [
                ['name', 'vendor_url', 'part'],
                ['Windows Server 2019', 'https://www.microsoft.com/ja-jp/windows-server', 'Operating System'],
                true
            ],
            'NG' => [
                ['name', 'vendor_url', 'part'],
                ['Windows Server 2019!', 'https://www.microsoft.com/ja-jp/windows-server', 'Operating System'],
                false
            ],
        ];
    }

}
