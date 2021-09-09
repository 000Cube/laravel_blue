<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HelloController extends Controller
{
    public function index(Request $request, Response $response){

        $html = <<<EOF
        <h1>Index</h1>

        <h3>Request</h3>
        <pre>{$request}</pre>
        <pre>
            url():アクセスしたURLを返すメソッド
            {$request->url()}
        </pre>
        <pre>
            fullUrl():アクセスしたURLをクエリー文字列なども含めて返すメソッド
            {$request->fullUrl()}
        </pre>
        <pre>
            path():ドメイン下のパスのみ返すメソッド
            {$request->path()}
        </pre>

        <h3>Response</h3>
        <pre>{$response}</pre>
        <pre>
            status():ステータスコードを返すメソッド
            {$response->status()}
        </pre>
        <pre>
            content():コンテンツを取得するメソッド
            {$response->content()}
        </pre>
        <pre>
            setContent(値):引数の値にコンテンツを変更するメソッド
            {$response->setContent('値')}
        </pre>

        EOF;

        $response->setContent($html);

        return $response;
    }

    public function other(){

        return <<<EOF
        <h1>hello/other</h1>
        <p>これはHelloコントローラーのotherアクションです</p>
        EOF;
    }
}
