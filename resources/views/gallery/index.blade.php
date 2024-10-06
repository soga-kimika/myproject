@extends('adminlte::page')

@section('title', 'フォトギャラリー')

@section('content_header')
<h1><i class="far fa-image"></i>フォトギャラリー</h1>
@stop

@section('content')
@include('partials.errors') 
    {{-- 入力フォーム --}}
    <div class="container">
        <div class="col-md-12 mx-auto"> 
            <form action="{{ route('galleries.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                {{-- 入力フォーム --}}
                <div class="border-bottom pb-2 mb-3 mt-4">
                    <div class="col-md-12 d-flex mb-3">
                        <div class="d-flex align-items-center">
                            <input type="file" name="imageUpload" id="imageUpload" accept="image/*" class="d-none" onchange="displayFileName()" required>
                            <span id="fileName" class="ms-2 file-name"></span>
                            <label for="imageUpload" class="btn me-2 form-check-label btn-select">
                                画像を選択 <i class="fas fa-upload"></i> 
                            </label>
                            <button type="submit" class="btn btn-store ms-2">登録</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        {{-- 登録した写真の表示 --}}
        <div class="row mt-4">
            @if ($galleries->isEmpty())
                <div class="col-md-12 text-center">
                    <p>まだ画像が登録されていません</p>
                </div>
            @else
                @foreach ($galleries as $gallery)
                    <div class="col-lg-2 ">
                        <div class="card">
                            <img src="{{ asset('storage/' . $gallery->image_url) }}" class="card-img-top" alt="{{ $gallery->image_name }}" onclick="showImage('{{ asset('storage/' . $gallery->image_url) }}')">
                            <div class="gallery-card-body text-center">
                                <button class="btn btn-dangers gallery-card-icon" data-toggle="modal" data-target="#deleteGalleryModal{{ $gallery->id }}"><i class="fa fa-trash-alt "></i></button>
                            </div>
                        </div>
                    </div>
                    
                    @include('gallery.delete', ['image_url' => $gallery->image_url])

                @endforeach
            @endif
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
        const imageModal = new bootstrap.Modal(document.getElementById('imageModal'));
        imageModal.show();
    }
</script>
@stop
