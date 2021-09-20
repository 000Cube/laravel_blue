<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\HelloRequest;
use App\Http\Requests\CookieRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class HelloController extends Controller
{
    public function index(Request $request){
        $items = DB::table('people')->get();
        return view('hello.index',['items' => $items]);
    }

    public function post(CookieRequest $request){
        $msg = $request->msg;
        $response = new Response(view('hello.index',[
            'msg' => "『{$msg}』をクッキーに保存しました。"
        ]));
        $response->cookie('msg',$msg,100);
        return $response;
    }

    public function rest(){
        return view('hello.rest');
    }

    public function show(Request $request){
        $name = $request->name;
        $min = $request->min;
        $max = $request->max;
        $page = $request->page;

        $items = DB::table('people')
                ->get();

        return view('hello.show',['items' => $items]);
    }

    public function add(){
        return view('hello.add');
    }

    public function create(Request $request){
        $param = [
            'name' => $request->name,
            'email' => $request->email,
            'age' => $request->age,
        ];

        DB::table('people')->insert($param);
        return redirect('/hello');
    }

    public function edit(Request $request){
        $id = $request->id;
        $item = DB::table('people')->where('id',$id)->first();
        return view('hello.edit',['form' => $item]);
    }

    public function update(Request $request){
        $param = [
            'name' => $request->name,
            'email' => $request->email,
            'age' => $request->age
        ];

        DB::table('people')
        ->where('id',$request->id)
        ->update($param);
        return redirect('/hello');
    }

    public function delete(Request $request){
        $id = $request->id;
        $item = DB::table('people')->where('id',$id)->first();
        return view('hello.del',['form' => $item]);
    }

    public function remove(Request $request){
        DB::table('people')
        ->where('id',$request->id)
        ->delete();
        return redirect('/hello');
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
