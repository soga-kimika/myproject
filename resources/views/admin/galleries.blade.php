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

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>ファイル名</th>
                <th>画像</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($galleries as $gallery)
                <tr>
                    <td>{{ $gallery->id }}</td>
                    <td>{{ $gallery->image_name }}</td>
                    <td>
                        <img src="{{ asset('storage/' . $gallery->image_url) }}" alt="{{ $gallery->image_name }}" style="width: 100px;">
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
        </tbody>
    </table>
</div>
{{-- ページネーションリンク --}}
{{ $galleries->links() }}
@endsection
@section('css')
<link rel="stylesheet" href="{{ asset('/css/item/index.css') }}">
@stop

@section('js')
<script>
</script>
@stop
