@extends('adminlte::page')

@section('title', 'マイホームNOTE')

@section('content_header')  
<h1>Client Management</h1>                                                            
@stop   

@section('content')
<div class="container">
 
    <div class="mb-3">
        <form method="GET" action="{{ route('admin.clients.index') }}">
            <input type="text" name="search" placeholder="検索" value="{{ request('search') }}">
            <button type="submit">検索</button>
        </form>
    </div>

    <div style="overflow-x:auto;">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ユーザーID</th>
                    <th>ユーザー名</th>
                    <th>土地予算(￥)</th>
                    <th>土地坪数</th> 
                    <th>建物予算(￥)</th> 
                    <th>建物坪数</th> 
                    <th>建築希望地</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clients as $client)
                    <tr data-toggle="collapse" data-target="#details-{{ $client->id }}" class="clickable">
                        <td>{{ $client->user_id }}</td>
                        <td>{{ $client->user->name }}</td>
                        <td>{{ $client->land_budget }}</td>
                        <td>{{ $client->land_area }}</td>
                        <td>{{ $client->building_budget }}</td>
                        <td>{{ $client->building_area }}</td>
                        <td>{{ $client->construction_area }}</td>
                        <td>
                            <button class="btn" onclick="event.stopPropagation(); return confirm('本当に削除しますか？');">
                                削除
                            </button>
                        </td>
                    </tr>
                    <tr id="details-{{ $client->id }}" class="collapse">
                        <td colspan="3">
                            <div>
                                <strong>大人:</strong> {{ $client->adult_count }}<br>
                                <strong>子供:</strong> {{ $client->child_count }}<br>
                                <strong>ペット:</strong> {{ $client->pet }}<br>
                                <strong>所有地:</strong> {{ $client->land_budget_exists }}<br>
                                <strong>階数:</strong> {{ $client->floors }}<br>
                                <strong>間取り:</strong> {{ $client->layout }}<br>
                                <strong>普通車:</strong> {{ $client->regularCars }}<br>
                                <strong>軽自動車:</strong> {{ $client->compactCars }}<br>
                                <strong>バイク:</strong> {{ $client->motorcycles }}<br>
                                <strong>自転車:</strong> {{ $client->bicycles }}<br>
                                <strong>完成希望日:</strong> {{ $client->date }}<br>
                                <strong>今の家の不満点:</strong> {{ $client->current_home_issues }}
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
{{-- ページネーションリンク --}}
{{ $clients->links('vendor.pagination.bootstrap-4') }}
@endsection

@section('css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('/css/item/index.css') }}">

@stop

@section('js')
<script>
    // カードをクリックでトグル
    $('.clickable').click(function() {
        $(this).next().toggle();
    });
</script>
@stop
