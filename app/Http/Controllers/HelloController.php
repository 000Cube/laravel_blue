<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HelloController extends Controller
{
    public function index(){
        $array = [
            'message' => 'アクションからのメッセージです',
            'messageTwo' => '追加のメッセージです'
        ];
        
        $data = [
            ['name' => 'かいじ', 'mail' => 'kaiji@kaiji.com'],
            ['name' => 'かの', 'mail' => 'kano@kano.com'],
        ];
        return view('hello.index',$array,['data' => $data]);
    }
    /* public function index(Request $request, Response $response){

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
    } */

    public function other(){

        return <<<EOF
        <h1>hello/other</h1>
        <p>これはHelloコントローラーのotherアクションです</p>
        EOF;
    }

    public function view($id = 'zero'){
        
        $data = [
            'msg' => 'これはコントローラーから渡された値です。',
            'id' => $id,
        ];
        
        return view('hello.index', $data);

    }

    public function query(Request $request){
        
        $data = [
            'msg' => 'これはコントローラーから渡された値です。',
            'id' => $request->id,
        ];

        return view('hello.index', $data);

    }

    public function blade(){

        return view('hello.blade');

    }

    public function bladePost(Request $request){

        return view('hello.blade', ['msg' => $request->msg]);
        
    }

    public function forEach(){

        $data = [
            'one',
            'two',
            'three',
            'four',
            'five',
        ];

        return view('hello.forEach',['data' => $data]);
    }

    public function For(){

        return view('hello.for');
        
    }

    public function While(){

        $data = [
            'one',
            'two',
            'three',
            'four',
            'five',
        ];

        return view('hello.while', ['data' => $data]);

    }
}
