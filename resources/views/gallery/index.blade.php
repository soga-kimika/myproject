@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1> <i class="far fa-address-card"></i>フォトギャラリー</h1>
@stop

@section('content')
<div class="container">
    <div class="form-group d-flex align-items-center col-md-12">
        <input type="text" name="request_message" id="request_message" class="form-control form-control-lg me-2" placeholder="要望を記入してください" required style="flex: 1;">
        <label for="imageUpload" class="btn me-2 form-check-label btn-select" style="cursor: pointer;">
            画像を選択 <i class="fas fa-upload"></i> 
        </label>
        <input type="file" name="imageUpload" id="imageUpload" accept="image/*" class="d-none"> 
        <button type="submit" class="btn btn-store ms-2">登録</button>
    </div>
    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="path/to/image1.jpg" class="card-img-top" alt="Image 1">
                <div class="card-body">
                    <h5 class="card-title">タイトル 1</h5>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="path/to/image2.jpg" class="card-img-top" alt="Image 2">
                <div class="card-body">
                    <h5 class="card-title">タイトル 2</h5>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="path/to/image3.jpg" class="card-img-top" alt="Image 3">
                <div class="card-body">
                    <h5 class="card-title">タイトル 3</h5>
                </div>
            </div>
        </div>
        <!-- 他の画像も同様に追加 -->
    </div>
</div>

@stop

@section('css')
<link rel="stylesheet" href="{{ asset('/css/item/index.css') }}">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
