@extends('layouts.helloapp')

@section('title','index')

@section('menubar')
    @parent
    インデックスページ
@endsection

@section('content')
<table>
    <tr>
        <th><a href="/hello?sort=name">Name</a></th>
        <th><a href="/hello?sort=email">Mail</a></th>
        <th><a href="/hello?sort=age">Age</a></th>
        <th>update</th>
        <th>delete</th>
    </tr>
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
{{$items->appends(['sort' => $sort])->links()}}
@endsection

@section('footer')
    copywright 2021 kaiji.
@endsection