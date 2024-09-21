@extends('adminlte::page')

@section('title', $pageTitle)


@section('content')
@section('content_header')
    <h1>{{ $pageTitle }}</h1>
@endsection


    @include('partials.errors')
    
         @include('partials.form', [
         'actionUrl' => route('items.store', $type),
         'submitButtonText' => '登録',
         'showRemoveOption' => $showRemoveOption,
    ]) 

    @include('partials.table', [
        'title' => $title1,
        'items' => $items1,
    ]) 

    @foreach ($items1 as $item)
        @include('partials.edit_modal', ['item' => $item])
    @endforeach
@stop

@section('css')
    <link rel="stylesheet" href="{{asset('/css/item/index.css')}}">
@stop

@section('js')

@stop
