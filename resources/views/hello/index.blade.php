@extends('layouts.helloapp')

@section('title','index')

@section('menubar')
    @parent
    インデックスページ
@endsection

@section('content')
<table>
    <tr><th>Name</th><th>Mail</th><th>Age</th><th>update</th><th>delete</th></tr>
    @foreach($items as $item)
        <tr>
            <td>{{$item->name}}</td>
            <td>{{$item->email}}</td>
            <td>{{$item->age}}</td>
            <td><a href="hello/edit?id={{$item->id}}">編集</a></td>
            <td><a href="hello/del?id={{$item->id}}">削除</a></td>
        </tr>
        @endforeach
</table>
@endsection

@section('footer')
    copywright 2021 kaiji.
@endsection