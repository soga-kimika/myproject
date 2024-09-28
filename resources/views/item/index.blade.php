@extends('adminlte::page')

@section('title', $pageTitle)

@section('content_header')
    <h1>{{ $pageTitle }}</h1>
@stop

@section('content')
    @include('partials.errors')

    <div class="container">
        @include('partials.form', [
        ])  
        @include('partials.table', [
            'title1' => $title1,
            'title2' => $title2,
            'items1' => $items1,
            'items2' => $items2,
        ]) 
@foreach($items1 as $item)
@include('partials.delete_modal', ['item' => $item])
@endforeach

@foreach($items2 as $item)
@include('partials.delete_modal', ['item' => $item])
@endforeach

</div>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('/css/item/index.css') }}">
@stop

@section('js')

<script>
    $(document).on('show.bs.modal', '.modal', function(event) {
        const button = $(event.relatedTarget); // 編集ボタンを取得
        const requestMessage = button.data('request'); // データ属性からリクエストメッセージを取得
        const priority = button.data('priority'); // データ属性から優先度を取得
    
        // フォームの値を設定
        $('input[name="edit_request_message"]').val(requestMessage); // リクエストメッセージを設定
        $('input[name="edit_priority"]').prop('checked', false); // すべてのラジオボタンをリセット
        $(`input[name="edit_priority"][value="${priority}"]`).prop('checked', true); // 選択した優先度をチェック
    });
    </script>
    

@stop
