@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1><i class="far fa-address-card"></i>フォトギャラリー</h1>
@stop

@section('content')
<div class="container">
    <div class="form-group d-flex align-items-center col-md-12">
        <label for="imageUpload" class="btn me-2 form-check-label btn-select" style="cursor: pointer;">
            画像を選択 <i class="fas fa-upload"></i>
        </label>
        <input type="file" name="imageUpload" id="imageUpload" accept="image/*" class="d-none" onchange="displayFileName()">
        <span id="fileName" class="ms-2"></span>
        <button type="submit" class="btn btn-store ms-2">登録</button>
    </div>
    <div class="row" id="gallery">
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="path/to/image1.jpg" class="card-img-top" alt="Image 1" data-bs-toggle="modal" data-bs-target="#photoModal" onclick="showImage('path/to/image1.jpg')">
                <div class="card-body">
                    <h5 class="card-title">タイトル 1</h5>
                </div>
            </div>
        </div>
        <!-- 他の画像も同様に追加 -->
    </div>
</div>

<!-- モーダル -->
<div class="modal fade" id="photoModal" tabindex="-1" aria-labelledby="phptpModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="photoModalLabel">画像</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img id="modalImage" src="" class="img-fluid" alt="Large Image">
            </div>
        </div>
    </div>
</div>

@stop

@section('css')
<link rel="stylesheet" href="{{ asset('/css/item/index.css') }}">
@stop

@section('js')
<script>
    function displayFileName() {
        const input = document.getElementById('imageUpload');
        const fileName = document.getElementById('fileName');
        fileName.textContent = input.files[0] ? input.files[0].name : '';
    }

    function showImage(imageSrc) {
        const modalImage = document.getElementById('modalImage');
        modalImage.src = imageSrc;
    }
</script>
@stop
