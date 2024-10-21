
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

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

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
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td class="management-user-text">{{ $user->name }}</td>
                        <td class="management-user-text">{{ $user->email }}</td>
                        <td class="align-items-center">
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
        <nav aria-label="Page navigation">
            <ul class="pagination">
              {{ $users->links() }}
            </ul>
          </nav>
          

    </div>
    @endsection
    @section('css')
    <link rel="stylesheet" href="{{ asset('/css/item/index.css') }}">
    @stop

    @section('js')
    <script>
    </script>
    @stop

