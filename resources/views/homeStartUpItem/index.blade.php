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
        // 指定されたinput要素を取得
        const input = document.getElementById(inputId);
        // 指定されたoutput要素を取得
        const output = document.getElementById(outputId);
        // ファイルが選択されている場合はファイル名を表示、そうでない場合は空にする
        output.textContent = input.files[0] ? input.files[0].name : '';
    }
    // 金額の形式を通過にフォーマットする関数
    function formatCurrency(value) {
        // ￥記号を付加し、カンマで区切って返す
        return '￥' + value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }
    // チェックされた項目の合計金額を計算する関数
    function calculateTotalChecked() {
        // 全体の合計を初期化
        let overallTotal = 0; 
        // 全てのカード要素を取得
        const cards = document.querySelectorAll('.card'); 
        // 各カードに対して処理を実行
        cards.forEach(card => {
            // カードごとの合計を初期化
            let cardTotal = 0; 
             // チェックされたチェックボックスを取得
            const checkboxes = card.querySelectorAll('.check-consulted:checked');
            // 各チェックボックスに対して処理を実行
            checkboxes.forEach(checkbox => {
                // チェックボックスの親要素から金額を取得
                const amount = parseInt(checkbox.closest('tr').querySelector('.col-amount').innerText.replace(/[^0-9]/g, ''));
                // カードの合計に加算
                cardTotal += amount; 
            });
            // カードごとの合計を表示
            const cardTotalElement = card.querySelector('.total-amount');
            if (cardTotalElement) {
                // フォーマットされた合計を表示
                cardTotalElement.innerText = '' + formatCurrency(cardTotal); 
            }
             // 全体の合計に加算
            overallTotal += cardTotal;
        });

        // フォーマットされた全体の合計を表示
        document.getElementById('overall-total').innerText = '' + formatCurrency(overallTotal); 
    }
    // DOMが読み込まれた後に実行
    document.addEventListener('DOMContentLoaded', () => {
        // 全てのチェックボックスを取得
        const checkboxes = document.querySelectorAll('.check-consulted');
        // 各チェックボックスに対して処理を実行
        checkboxes.forEach(checkbox => {
            // データ属性からIDを取得
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
            // チェックボックスの状態が変更された時のイベントリスナーを追加
            checkbox.addEventListener('change', () => {
                // 状態をlocalStorageに保存
                localStorage.setItem(`checkbox-${id}`, checkbox.checked); 
                // 合計の計算を呼び出す
                calculateTotalChecked(); 
            });
        });
        // 初回計算を実行
        calculateTotalChecked();
    });
</script>

@stop


