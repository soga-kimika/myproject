{{-- ホームスタートアップ一覧画面 --}}
@extends('adminlte::page')

@section('title', 'ホームスタートアップリスト')

@section('content_header')
<h1><i class="fas fa-shopping-cart"></i>ホームスタートアップリスト</h1>

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
    function calculateTotalChecked() {
    let total = 0;
    document.querySelectorAll('.check-consulted:checked').forEach(checkbox => {
        const amount = parseInt(checkbox.closest('tr').querySelector('.col-amount').innerText.replace(/[^0-9]/g, '')); // 金額を取得
        total += amount;
    });
    document.querySelectorAll('.total-amount').forEach(el => el.innerText = '合計金額: ￥' + total.toLocaleString());
}

document.addEventListener('DOMContentLoaded', () => {
    // 既存のチェックボックス初期化
    const checkboxes = document.querySelectorAll('.check-consulted');
    checkboxes.forEach(checkbox => {
        const id = checkbox.dataset.id;
        const checked = localStorage.getItem(`checkbox-${id}`) === 'true';
        checkbox.checked = checked;
        if (checkbox.checked) {
            calculateTotalChecked(); // 初回計算
        }
    });

    // チェックボックスの状態が変わったときの処理
    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', () => {
            localStorage.setItem(`checkbox-${checkbox.dataset.id}`, checkbox.checked);
            calculateTotalChecked(); // 合計の計算を呼び出す
        });
    });
});



</script>
@stop
