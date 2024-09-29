@extends('adminlte::page')

@section('title', $pageTitle)

@section('content_header')
<h1>{!! $pageIcon !!}{!! $pageTitle !!} </h1>
@stop

@section('content')
    @include('partials.errors')

    @include('partials.form')

    <div class="container">
        @include('partials.table', [
            'title1' => $title1,
            'title2' => $title2,
            'items1' => $items1,
            'items2' => $items2,
        ]) 
@foreach($items1 as $item)
    @include('partials.edit_modal', ['item' => $item, 'type' => $type]) 
    @include('partials.delete_modal', ['item' => $item])
@endforeach

@foreach($items2 as $item)
    @include('partials.edit_modal', ['item' => $item, 'type' => $type]) 
    @include('partials.delete_modal', ['item' => $item]) 
@endforeach


</div>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('/css/item/index.css') }}">
@stop

@section('js')

<script>
    

@stop
