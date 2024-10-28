{{-- ホームスタートアップ一覧画面 --}}
@extends('adminlte::page')

@section('title', 'ウィッシュリスト')

@section('content_header')
<h1><i class="fas fa-shopping-cart"></i>ウィッシュリスト</h1>
@stop

@section('content')
<div class="container home-startup-view"> 
    @include('partials.errors')
    @include('partials.home_startup.form')

    <div class="container">
        @include('partials.home_startup.table', [
            'homeStartupItems1'=> $homeStartupItems1,
            'homeStartupItems2' => $homeStartupItems2,
            'homeStartupItems3' => $homeStartupItems3,
        ]) 
    </div>
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

    // 金額の形式を通貨にフォーマットする関数
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
        checkboxes.forEach(checkbox => {
            const id = checkbox.dataset.id; 
            if (document.body.classList.contains('home-startup-view')) {
                const checkedState = localStorage.getItem(`checkbox-${id}`);
                checkbox.checked = (checkedState === 'true');
                checkbox.addEventListener('change', () => {
                    localStorage.setItem(`checkbox-${id}`, checkbox.checked); 
                    calculateTotalChecked(); 
                });
            } else {
                checkbox.checked = false; // 他のビューでは未チェック
            }
        });
        
        if (document.body.classList.contains('home-startup-view')) {
            calculateTotalChecked();
        }
    });

    // 全角で入力した数字を強制的に半角に変換
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
