@extends('adminlte::page')

@section('title', $pageTitle)

@section('content_header')
<h1>{!! $pageIcon !!}{!! $pageTitle !!}</h1>
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
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('/css/item/index.css') }}">
@stop

@section('js')
<script>
    // ファイル名の表示（ファイル名カスタムのため設定が必要）
    function displayFileName(inputId, outputId) {
        const input = document.getElementById(inputId);
        const output = document.getElementById(outputId);
        output.textContent = input.files[0] ? input.files[0].name : '';
    }

    // チェックボックスの状態を保持
    document.addEventListener('DOMContentLoaded', () => {
        const checkboxes = document.querySelectorAll('.check-consulted');

        // セッションストレージから状態を取得し、チェックボックスに反映
        checkboxes.forEach(checkbox => {
            const id = checkbox.dataset.id;
            const savedState = sessionStorage.getItem(`checkbox-${id}`);
            checkbox.checked = savedState === 'true'; // trueならチェック、falseなら未チェック

            // チェックボックスの状態が変わったときに保存
            checkbox.addEventListener('change', () => {
                sessionStorage.setItem(`checkbox-${id}`, checkbox.checked);
            });
        });
    });
</script>
@stop
