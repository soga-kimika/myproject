
@extends('adminlte::page')

@section('title', 'マイホームNOTE')

@section('content_header')                                                              

@stop   
@section('content')
<div class="container">
    <h1>User Management</h1>

    <div class="mb-3">
        <form method="GET" action="{{ route('admin.users.index') }}">
            <input type="text" name="search" placeholder="検索" value="{{ request('search') }}">
            <button type="submit">検索</button>
        </form>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>ユーザー名</th>
                <th>メール</th>
                <th>アクション</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display:inline;">
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
    {{ $users->links() }}
</div>
@endsection
@section('css')
<link rel="stylesheet" href="{{ asset('/css/item/index.css') }}">
@stop

@section('js')
<script>
</script>
@stop

