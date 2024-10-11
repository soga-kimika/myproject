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
    function displayFileName(inputId, outputId) {
        const input = document.getElementById(inputId);
        const output = document.getElementById(outputId);
        output.textContent = input.files[0] ? input.files[0].name : '';
    }

    function formatCurrency(value) {
        return '￥' + value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }

    function calculateTotalChecked() {
        let overallTotal = 0;
        const cards = document.querySelectorAll('.card');

        cards.forEach(card => {
            let cardTotal = 0;
            const checkboxes = card.querySelectorAll('.check-consulted:checked');

            checkboxes.forEach(checkbox => {
                const amount = parseInt(checkbox.closest('tr').querySelector('.col-amount').innerText.replace(/[^0-9]/g, ''));
                cardTotal += amount;
            });

            // カードごとの合計を表示
            const cardTotalElement = card.querySelector('.total-amount');
            if (cardTotalElement) {
                cardTotalElement.innerText = '' + formatCurrency(cardTotal);
            }

            overallTotal += cardTotal;
        });

        // 全体の合計を表示
        document.getElementById('overall-total').innerText = '' + formatCurrency(overallTotal);
    }
    document.addEventListener('DOMContentLoaded', () => {
    const checkboxes = document.querySelectorAll('.check-consulted');

    checkboxes.forEach(checkbox => {
        const id = checkbox.dataset.id;

        // localStorageからチェックボックスの状態を取得
        const checkedState = localStorage.getItem(`checkbox-${id}`);

        // 新規追加の場合、チェックボックスをチェック状態にする
        if (checkbox.classList.contains('new-record') || !checkedState) { 
            checkbox.checked = true;
        } else {
            // それ以外はlocalStorageから復元
            checkbox.checked = (checkedState === 'true');
        }

        // チェックボックスの状態をlocalStorageに保存
        localStorage.setItem(`checkbox-${id}`, checkbox.checked);

        checkbox.addEventListener('change', () => {
            localStorage.setItem(`checkbox-${id}`, checkbox.checked);
            // 合計の計算を呼び出す
            calculateTotalChecked(); 
        });
    });

    // 初回計算
    calculateTotalChecked();
});




</script>
@stop


