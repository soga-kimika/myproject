@extends('adminlte::page')

@section('title', 'フォトギャラリー')

@section('content_header')
<h1><i class="far fa-image"></i>フォトギャラリー</h1>
@stop

@section('content')
    {{-- 入力フォーム --}}
    <div class="container">
        <div class="col-md-12 mx-auto"> 
            <form action="{{route('galleries.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                {{-- 入力フォーム --}}
                <div class="border-bottom pb-2 mb-3 mt-4">
                    <div class="col-md-12 d-flex mb-3">
                            <div class="d-flex align-items-center">
                                <div class="d-flex align-items-center">
                                    {{-- ファイル名表示 --}}
                                    <input type="file" name="imageUpload" id="imageUpload" accept="image/*" class="d-none" onchange="displayFileName('imageUpload', 'fileName')">
                                    <span id="fileName" class="ms-2 file-name"></span>
                                </div>
                                    {{-- 画像選択ボタン --}}
                                    <label for="imageUpload" class="btn me-2 form-check-label btn-select" >
                                        画像を選択 <i class="fas fa-upload"></i> 
                                    </label>
                                    {{-- 登録ボタン  --}}
                                    <button type="submit" class="btn btn-store ms-2">登録</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
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
