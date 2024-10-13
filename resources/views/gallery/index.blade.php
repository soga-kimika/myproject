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
                <div class="border-bottom pb-2 mb-3 mt-4">
                    <div class="col-md-12 d-flex mb-3 justify-content-end">
                        <div class="d-flex align-items-center pr-2">
                            {{-- ファイル名表示 --}}
                            <input type="file" name="imageUpload" id="imageUpload" accept="image/*" class="d-none" onchange="displayFileName()" required>
                            <span id="fileName" class="ms-2 gallery-file-name"></span>
                            {{-- ファイル投稿ボタン --}}
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
                            {{-- 登録した画像 --}}
                            <img src="{{ asset('storage/' . $gallery->image_url) }}" class="card-img-top" alt="{{ $gallery->image_name }}" onclick="showImage('{{ asset('storage/' . $gallery->image_url) }}')">
                            <div class="gallery-card-body text-center">
                                {{-- 削除ボタン --}}
                                <button class="btn btn-dangers gallery-card-icon" data-toggle="modal" data-target="#deleteGalleryModal{{ $gallery->id }}">
                                    <i class="fa fa-trash-alt"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    {{-- 削除モーダル読み込み --}}
                    @include('gallery.delete', ['image_url' => $gallery->image_url])

                @endforeach
            @endif
        </div>
    </div>

    {{-- ギャラリー画像モーダル --}}
    <div class="modal fade" id="GalleryImageModal" tabindex="-1" role="dialog" aria-labelledby="GalleryImageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                 {{-- モーダルヘッダー --}}
                <div class="modal-header">
                    <h5 class="modal-title" id="GalleryImageModalLabel">画像</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {{-- モーダル中身 --}}
                <div class="modal-body text-center">
                    <img id="modalImage" src="" class="img-fluid" alt="Image">
                </div>
                {{-- モーダルフッター --}}
                <div class="modal-footer">
                    {{-- 閉じるボタン --}}
                    <button type="button" class="btn btn-defaults" data-dismiss="modal"><i class="fa fa-undo-alt"></i></button>
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
     // ファイル名を表示
    function displayFileName() {
        // idが'imageUpload'のinput要素を取得
        const input = document.getElementById('imageUpload');
       // idが'fileName'の要素を取得
        const fileName = document.getElementById('fileName');
        // ファイルが選択していれば、ファイル名を表示し、なければ空文字を表示
        fileName.textContent = input.files[0] ? input.files[0].name : '';
    }
        
    // 画像をモーダルに表示
    function showImage(imageSrc) {
        // idが'modalImage'のimg要素を取得
        const modalImage = document.getElementById('modalImage');
        // モーダルに表示する画像のsrcを設定
        modalImage.src = imageSrc;
        // Bootstrapのモーダルを初期化
        const imageModal = new bootstrap.Modal(document.getElementById('GalleryImageModal'));
        // モーダルを表示
        imageModal.show();
    }
</script>
@stop
