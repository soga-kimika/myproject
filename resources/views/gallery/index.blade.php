@extends('adminlte::page')

@section('title', 'フォトギャラリー')

@section('content_header')
<h1><i class="far fa-image"></i>フォトギャラリー</h1>
@stop

@section('content')
<div class="container">
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
