{{-- ホームスタートアップ一覧画面 --}}
@extends('adminlte::page')

@section('title', 'ホームスタートアップリスト')

@section('content_header')
<h1>ホームスタートアップリスト</h1>
@stop

@section('content')
    @include('partials.errors')

    @include('partials.home_startup.form')

    <div class="container">
        @include('partials.home_startup.table', [
            'homeStartupItem1'=> $homeStartupItem1,
            'homeStartupItem2' => $homeStartupItem2,
            'homeStartupItem3' => $homeStartupItem3,
        ]) 
@foreach($homeStartupItem1 as $homeStartupItem1)
    @include('partials.home_startup.edit_modal', ['homeStartupItem' => $homeStartupItem]) 
    @include('partials.home_startup.delete_modal', ['homeStartupItem' => $homeStartupItem])
@endforeach

@foreach($homeStartupItem2 as $homeStartupItem2)
    @include('partials.home_startup.edit_modal', ['homeStartupItem' => $homeStartupItem]) 
    @include('partials.home_startup.delete_modal', ['homeStartupItem' => $homeStartupItem]) 
@endforeach

@foreach($homeStartupItem3 as $homeStartupItem3)
    @include('partials.home_startup.edit_modal', ['homeStartupItem' => $homeStartupItem]) 
    @include('partials.home_startup.delete_modal', ['homeStartupItem' => $homeStartupItem]) 
@endforeach


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
});

// チェックボックスの状態が変わったときに保存
checkboxes.forEach(checkbox => {
    checkbox.addEventListener('change', () => {
        const id = checkbox.dataset.id;
        localStorage.setItem(`checkbox-${id}`, checkbox.checked);
    });
});
});


</script>
@stop

