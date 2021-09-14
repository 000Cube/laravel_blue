<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\HelloRequest;
use App\Http\Requests\CookieRequest;
use Illuminate\Support\Facades\Validator;

class HelloController extends Controller
{
    public function index(Request $request){
        if($request->hasCookie('msg')){
            $msg = 'COOKIE:'.$request->cookie('msg');
        } else {
            $msg = '※クッキーはありません。';
        }
        return view('hello.index',['msg' => $msg]);
    }

    public function post(CookieRequest $request){
        $msg = $request->msg;
        $response = new Response(view('hello.index',[
            'msg' => "『{$msg}』をクッキーに保存しました。"
        ]));
        $response->cookie('msg',$msg,100);
        return $response;
    }

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
