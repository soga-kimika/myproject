{{-- ホームスタートアップ一覧画面 --}}
@extends('adminlte::page')

@section('title', 'ホームスタートアップリスト')

@section('content_header')
<h1><i class="fas fa-tasks"></i>ホームスタートアップリスト</h1>

@stop

@section('content')
    @include('partials.errors')

    @include('partials.home_startup.form')

    <div class="container">
        @include('partials.home_startup.table', [
            'homeStartupItems1'=> $homeStartupItems1,
            'homeStartupItems2' => $homeStartupItems2,
            'homeStartupItems3' => $homeStartupItems3,
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
    checkboxes.forEach(checkbox => {
        const id = checkbox.dataset.id;
        const checked = localStorage.getItem(`checkbox-${id}`) === 'true';
        checkbox.checked = checked;

        // チェックボックスの状態が変わったときに保存
        checkbox.addEventListener('change', () => {
            localStorage.setItem(`checkbox-${id}`, checkbox.checked);
            calculateTotalChecked(); // 合計の計算をここで呼び出す
        });
    });

    // 初回計算
    calculateTotalChecked();
});



</script>
@stop
