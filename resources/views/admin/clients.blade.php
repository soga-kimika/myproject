@extends('adminlte::page')

@section('title', 'マイホームNOTE')

@section('content_header')                                                              
@stop   

@section('content')
<div class="container">
    <h1>Client Management</h1>
    <div class="mb-3">
        <form method="GET" action="{{ route('admin.clients.index') }}">
            <input type="text" name="search" placeholder="検索" value="{{ request('search') }}">
            <button type="submit">検索</button>
        </form>
    </div>

    <div style="overflow-x:auto;">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>ユーザー名</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clients as $client)
                    <tr data-toggle="collapse" data-target="#details-{{ $client->id }}" class="clickable">
                        <td>{{ $client->user_id }}</td>
                        <td>{{ $client->name }}</td>
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
                                <strong>土地予算:</strong> {{ $client->land_budget }}<br>
                                <strong>土地坪数:</strong> {{ $client->land_area }}<br>
                                <strong>建物予算:</strong> {{ $client->building_budget }}<br>
                                <strong>建物坪数:</strong> {{ $client->building_area }}<br>
                                <strong>階数:</strong> {{ $client->floors }}<br>
                                <strong>間取り:</strong> {{ $client->layout }}<br>
                                <strong>普通車:</strong> {{ $client->regularCars }}<br>
                                <strong>軽自動車:</strong> {{ $client->compactCars }}<br>
                                <strong>バイク:</strong> {{ $client->motorcycles }}<br>
                                <strong>自転車:</strong> {{ $client->bicycles }}<br>
                                <strong>建築希望地:</strong> {{ $client->construction_area }}<br>
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
{{ $clients->links() }}
@endsection

@section('css')
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
