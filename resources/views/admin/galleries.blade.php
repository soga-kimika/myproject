@extends('adminlte::page')

@section('title', 'マイホームNOTE')

@section('content_header')                                                              
<h1>Gallery Management</h1> 
@stop   

@section('content')
<div class="container">

    <div class="mb-3">
        <form method="GET" action="{{ route('admin.galleries.index') }}">
            <input type="text" name="search" placeholder="検索" value="{{ request('search') }}">
            <button type="submit">検索</button>
        </form>
    </div>

    <table class="table  table-striped">
        <thead>
            <tr>
                <th>ユーザーID</th>
                <th>ユーザー名</th>
                <th>ファイル名</th>
                <th>画像</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
            @if ($galleries->isEmpty())
            <tr>
                <td colspan="8" class="text-center">ギャラリーが見つかりませんでした。</td>
            </tr>
        @else
            @foreach ($galleries as $gallery)
                <tr>
                    <td>{{ $gallery->user_id }}</td>
                    <td>{{ $gallery->user->user_id }}</td>
                    <td>{{ $gallery->image_name }}</td>
                    <td>
                        <img src="{{ $gallery->image_url }}" alt="{{ $gallery->image_name }}" style="width: 100px;">
                    </td>
                    <td>
                        <form action="{{ route('galleries.destroy', $gallery->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn" onclick="return confirm('本当に削除しますか？');">削除</button>   
                        </form>
                    </td>
                </tr>
            @endforeach
            @endif
        </tbody>
    </table>
</div>
{{-- ページネーションリンク --}}
{{ $galleries->links('vendor.pagination.bootstrap-4') }}
@endsection
@section('css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('/css/item/index.css') }}">

@stop

@section('js')
<script>
</script>
@stop
