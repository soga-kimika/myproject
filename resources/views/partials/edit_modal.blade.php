<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- ブートストラップ読み込み -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- アドミンLTE読み込み -->
    <link href="{{ asset('css/adminlte.min.css') }}" rel="stylesheet">
    @yield('css')
</head>
<body>
    <!-- エラー -->
    <div class="container">
        @include('partials.errors') 
        @yield('content')
    </div>
    
   <!-- 編集モーダル -->
    <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $item->id }}" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="editModalLabel{{ $item->id }}">編集</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ route('items.update', ['type' => $type, 'itemId' => $item->id]) }}">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        @include('partials.form', ['actionUrl' => route('items.update', ['type' => $type, 'itemId' => $item->id]), 'submitButtonText' => '更新'])
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">更新</button>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{ $item->id }}">削除</button>
                        @include('partials.delete_modal', ['id' => $item->id])
                        <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <!-- Include jQuery -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <!-- Include Bootstrap JS -->
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <!-- Include AdminLTE JS -->
    <script src="{{ asset('js/adminlte.min.js') }}"></script>
    @yield('js')
</body>
</html>
