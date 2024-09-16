    @extends('adminlte::page')

    @section('title', $pageTitle)

    @section('content')
        @include('partials.errors')
        
        @include('partials.form', [
            'actionUrl' => route('items.store', $type),
            'submitButtonText' => '登録',
            'showRemoveOption' => $showRemoveOption,
        ])

        <!-- 最初のカード -->
        @include('partials.table', [
            'title' => $title1,
            'items' => $items1,
        ])

    
    @stop

    @section('css')
        <!-- Custom CSS if needed -->
        <style>
        .fa-star{
            color: gold;
        }
        .fa-star-half-alt{
            color: gold;    
        }
        .fa-times{
            color: red;
        }

        
        .card-header:first-child{

            background-color:#dc3545;
          
        }
        
        
        
        .custom-table thead th {
            font-size: 0.85rem; /* ヘッドのフォントサイズを小さくする */
            padding: 5px;
            background-color:#3f6791 ;
  
        
            
        }

        .custom-table tbody td {
            max-width: 150px; /* セルの最大幅を設定 */
            white-space: nowrap; /* テキストが折り返されないようにする */
            overflow: hidden; /* オーバーフローする部分を隠す */
            text-overflow: ellipsis; /* テキストが溢れる部分を「...」で省略 */  
        }

        .custom-table img {
            max-width: 100px; /* 画像の最大幅を設定 */
            height: auto; /* 高さは自動で調整 */
}
/* .custom-table th, .custom-table td {
        vertical-align: middle;
    }

    .col-priority {
        width: 150px; /* Adjust as needed */
    }
/* 
    .col-request {
        width: 60%; /* Make the request column wide */
    } */

    /* .col-actions {
        width: 200px; /* Adjust as needed to fit both buttons */
    } */ */
</style>

    @stop

    @section('js')
    
    @stop
