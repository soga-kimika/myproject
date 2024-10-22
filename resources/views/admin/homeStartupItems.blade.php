@extends('adminlte::page')

@section('title', 'マイホームNOTE')

@section('content_header')   
<h1>Wishlist Management</h1>                                                           
@stop   

@section('content')
<div class="container">

    <div class="mb-3">
        <form method="GET" action="{{ route('admin.homeStartupItems.index') }}">
            <input type="text" name="search" placeholder="検索" value="{{ request('search') }}">
            <button type="submit">検索</button>
        </form>
    </div>

    <table class="table  table-hover">
        <thead>
            <tr>
                <th>ユーザーID</th>
                <th>カテゴリー</th>
                <th>品名</th>
                <th>合計(円)</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($homeStartupItems as $item)
                <tr data-toggle="collapse" data-target="#details-{{ $item->id }}" class="clickable">
                    <td>{{ $item->id }}</td>
                    <td >{{ $item->category }}</td>
                    <td >{{ $item->item_name }}</td>
                    <td>{{ number_format($item->amount) }}</td>
                    <td>
                        <form action="{{ route('admin.homeStartupItems.destroy', $item->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit"  class="btn" onclick="return confirm('本当に削除しますか？');">削除</button>
                        </form>
                    </td>
                </tr>
                <tr id="details-{{ $item->id }}" class="collapse">
                    <td colspan="5">
                        <div>
                            <strong>メーカー・型番:</strong> {{ $item->manufacturer }}<br>
                            <strong>単価(円):</strong> {{ number_format($item->price) }}<br>
                            <strong>数量:</strong> {{ number_format($item->quantity) }}<br>
                            <strong>画像:</strong> 
                            @if ($item->image_url)
                                <img src="{{ asset('storage/' . $item->image_url) }}" alt="{{ $item->item_name }}" style="width: 100px;">
                            @else
                                画像なし
                            @endif
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
{{-- ページネーションリンク --}}
{{ $homeStartupItems->links('vendor.pagination.bootstrap-4') }}
</div>
@endsection

@section('css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('/css/item/index.css') }}">

<style>

</style>
@stop

@section('js')
<script>
</script>
@stop
