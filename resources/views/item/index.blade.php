@extends('adminlte::page')

@section('title', $pageTitle)

@section('content')
    @include('partials.errors')
    
        @include('partials.form', [
        'actionUrl' => route('items.store', $type),
        'submitButtonText' => '登録',
        'showRemoveOption' => $showRemoveOption,
    ])

    <!-- 最初のカード -->
    @include('partials.table', [
        'title' => $title1,
        'items' => $items1,
    ]) 
@stop

@section('css')
    <link rel="stylesheet" href="{{asset('/css/item/index.css')}}">
@stop

@section('js')

@stop
