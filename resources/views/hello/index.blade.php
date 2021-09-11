@extends('layouts.helloapp')

@section('title','index')

@section('menubar')
    @parent
    インデックスページ
@endsection

@section('content')

    <p>ここが本文のコンテンツです</p>
    <p>Controller value<br> 'message' = {{$message}}</p>
    <p>ViewComposer value<br> 'view_message' = {{$view_message}}</p>

    @component('components.message')
        @slot('msg_title')
            COUTION!
        @endslot

        @slot('msg_content')
            {{$message}}
        @endslot
    @endcomponent

    @include(
        'components.message',[
            'msg_title' => 'OK!',
            'msg_content' => 'サブビューです'
        ]
    )

    @each('components.item', $data, 'item')

@endsection

@section('footer')
    copywright 2021 kaiji.
@endsection