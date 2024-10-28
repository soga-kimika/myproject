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
        document.addEventListener('DOMContentLoaded', () => {
    const checkboxes = document.querySelectorAll('.check-consulted');
    checkboxes.forEach(checkbox => {
        const id = checkbox.dataset.id;

        // ホームスタートアップビューの場合
        if (document.body.classList.contains('home-startup-view')) {
            const checkedState = localStorage.getItem(`checkbox-${id}`);
            // localStorageからチェック状態を取得し、未チェックの場合はチェック済みにする
            checkbox.checked = (checkedState === 'true'); // 'true'の場合のみチェック
        } else {
            // アイテムのビューでは未チェックにする
            checkbox.checked = false;
        }

        // チェックボックスの状態が変わったときに保存
        checkbox.addEventListener('change', () => {
            localStorage.setItem(`checkbox-${id}`, checkbox.checked);
            calculateTotalChecked(); // 合計計算の呼び出し
        });
    });

    // ホームスタートアップビューの場合のみ合計を計算
    if (document.body.classList.contains('home-startup-view')) {
        calculateTotalChecked();
    }
});

    checkboxes.forEach(checkbox => {
        const id = checkbox.dataset.id;

        // ホームスタートアップビューの場合
        if (document.body.classList.contains('home-startup-view')) {
            const checkedState = localStorage.getItem(`checkbox-${id}`);
            // localStorageからチェック状態を取得、未チェックならチェック済みにする
            checkbox.checked = (checkedState === 'true') || (checkedState === null);
        } else {
            // アイテムのビューでは未チェックにする
            checkbox.checked = false;
        }

        // チェックボックスの状態が変わったときに保存
        checkbox.addEventListener('change', () => {
            localStorage.setItem(`checkbox-${id}`, checkbox.checked);
            calculateTotalChecked(); // 合計計算の呼び出し
        });
    });

    // ホームスタートアップビューの場合のみ合計を計算
    if (document.body.classList.contains('home-startup-view')) {
        calculateTotalChecked();
    }
});

        // 全角で入力した数字を強制的に半角に変換
        function convertToHalfWidth(event, input) {
        // 入力内容を取得
        let value = input.value;

        // 全角数字を半角に変換
        const fullWidthNumbers = {
            '０': '0', '１': '1', '２': '2', '３': '3', '４': '4',
            '５': '5', '６': '6', '７': '7', '８': '8', '９': '9'
        };

        // 全角数字を半角に変換し、全角文字を除去
        let convertedValue = value.replace(/[０-９]/g, function (char) {
            return fullWidthNumbers[char];
        });

        // 半角以外の文字を除去
        convertedValue = convertedValue.replace(/[^0-9]/g, '');

        // 変換した値を入力フィールドにセット
        input.value = convertedValue;
    }




    </script>

    @stop


