<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\HelloRequest;
use Illuminate\Support\Facades\Validator;

class HelloController extends Controller
{
    public function index(Request $request){
        //Validatorクラスの利用
        /* $validator = Validator::make($request->query(),[
            'id' => 'required',
            'pass' => 'required',
        ]);
        if($validator->fails()){
            $msg = 'クエリーに問題があります。';
        } else{
            $msg = 'ID/PASSを受け付けました。フォームを入力してください。';
        } */
        return view('hello.index',['msg' => 'フォームを入力してください。']);
    }

    public function post(HelloRequest $request){
        return view('hello.index',['msg' => '正しく入力されました！']);
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
