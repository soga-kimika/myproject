{{-- ホームスタートアップ一覧画面 --}}
@extends('adminlte::page')

@section('title', 'ウィッシュリスト')

@section('content_header')
<h1><i class="fas fa-shopping-cart"></i>ウィッシュリスト</h1>
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
    // ファイル名を表示する関数
    function displayFileName(inputId, outputId) {
        const input = document.getElementById(inputId);
        const output = document.getElementById(outputId);
        output.textContent = input.files[0] ? input.files[0].name : '';
    }

    // 金額の形式をフォーマットする関数
    function formatCurrency(value) {
        return '￥' + value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }

    // チェックされた項目の合計金額を計算する関数
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
            const cardTotalElement = card.querySelector('.total-amount');
            if (cardTotalElement) {
                cardTotalElement.innerText = formatCurrency(cardTotal); 
            }
            overallTotal += cardTotal;
        });
        document.getElementById('overall-total').innerText = formatCurrency(overallTotal); 
    }

    document.addEventListener('DOMContentLoaded', () => {
        const checkboxes = document.querySelectorAll('.check-consulted');

        // 初期状態を未チェックにする
        checkboxes.forEach(checkbox => {
            checkbox.checked = false; // すべて未チェック
        });

        checkboxes.forEach(checkbox => {
            const id = checkbox.dataset.id;
            // localStorageから状態を取得
            const savedState = localStorage.getItem(`checkbox-${id}`);
            
            // localStorageの値がある場合、その状態を反映
            if (savedState !== null) {
                checkbox.checked = savedState === 'true'; // trueならチェック、falseなら未チェック
            }

            // チェックボックスの状態が変わったときに保存
            checkbox.addEventListener('change', () => {
                localStorage.setItem(`checkbox-${id}`, checkbox.checked);
                // 合計計算の呼び出し
                calculateTotalChecked(); 
            });
        });

        // 合計計算の初回呼び出し
        calculateTotalChecked(); 
    });

    // 全角で入力した数字を半角に変換
    function convertToHalfWidth(event, input) {
        let value = input.value;
        const fullWidthNumbers = {
            '０': '0', '１': '1', '２': '2', '３': '3', '４': '4',
            '５': '5', '６': '6', '７': '7', '８': '8', '９': '9'
        };
        let convertedValue = value.replace(/[０-９]/g, char => fullWidthNumbers[char]);
        convertedValue = convertedValue.replace(/[^0-9]/g, '');
        input.value = convertedValue;
    }
</script>
@stop
