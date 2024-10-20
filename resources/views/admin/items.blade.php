@extends('adminlte::page')

@section('title', 'マイホームNOTE')

@section('content_header')                                                              
@stop   

@section('content')
<div class="container">
    <h1>Item Management</h1>
    <div class="mb-3">
        <form method="GET" action="{{ route('admin.items.index') }}">
            <input type="text" name="search" placeholder="検索" value="{{ request('search') }}">
            <button type="submit">検索</button>
        </form>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>user_id</th>
                <th>カテゴリー</th>
                <th class="wide-column">要望</th>
                <th>優先度</th>
                <th>画像</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
            @foreach($items as $item)
                <tr>
                    <td>{{ $item->user_id }}</td>
                    <td>{{ $item->category }}</td>
                    <td class="wide-column">{{ $item->request_message }}</td>
                    <td>{{ $item->priority }}</td>
                    <td>
                        @if ($item->image_url)
                            <img src="{{ asset('storage/' . $item->image_url) }}" alt="{{ $item->request_message }}" class="img-thumbnail" width="100">
                        @else
                            画像なし
                        @endif
                    </td>
                    <td>
                        <form action="{{ route('admin.items.destroy', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn" onclick="return confirm('本当に削除しますか？');">削除</button> 
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{-- ページネーションリンク --}}
    {{ $items->links() }}
</div>
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('/css/item/index.css') }}">

@stop

@section('js')
<script>
</script>
@stop
