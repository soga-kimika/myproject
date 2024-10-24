@extends('adminlte::page')

@section('title', 'マイホームNOTE')

@section('content_header')                                                              
<h1>User Management</h1>
@stop   

@section('content')
<div class="container">

    <div class="mb-3">
        <form method="GET" action="{{ route('admin.users.index') }}">
            <input type="text" name="search" placeholder="検索" value="{{ request('search') }}">
            <button type="submit">検索</button>
        </form>
    </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ユーザーID</th>
                    <th>ユーザー名</th>
                    <th>メール</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                @if ($users->isEmpty())
                <tr>
                    <td colspan="8" class="text-center">ユーザーが見つかりませんでした。</td>
                </tr>
            @else
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td class="management-user-text">{{ $user->name }}</td>
                        <td class="management-user-text">{{ $user->email }}</td>
                        <td class="align-items-center">
                            {{-- 管理者でない場合 --}}
                            @if(!$user->isAdmin())
                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn" onclick="return confirm('本当に削除しますか？');">削除</button>
                            </form>
                            @else
                            {{-- 管理者の場合 --}}
                            <span class="text-muted">管理者</span>
                        </td>
                        @endif
                    </tr>
                @endforeach 
                @endif
            </tbody>
        </table>
        <ul class="pagination">
            {{ $users->links('vendor.pagination.bootstrap-4') }}
        </ul>


</div>
@endsection

@section('css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('/css/item/index.css') }}">
@stop

@section('js')
<script src="https://cdn.tailwindcss.com"></script>
@stop
