@extends('adminlte::page')

@section('title', $pageTitle)

@section('content_header')
    <h1>{{ $pageTitle }}</h1>
@stop

@section('content')
    @include('partials.errors')

    <div class="container">
        @include('partials.form', [
            'actionUrl' => route('items.store', $type),
            'submitButtonText' => '登録',
            'showRemoveOption' => $showRemoveOption,
        ])  
        @include('partials.table', [
            'title1' => $title1,
            'title2' => $title2,
            'items1' => $items1,
            'items2' => $items2,
        ]) 
       
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('/css/item/index.css') }}">
@stop

@section('js')
@stop
