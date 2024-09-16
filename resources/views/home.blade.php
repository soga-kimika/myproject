@extends('adminlte::page')

@section('title', 'ダッシュボード')

@section('content_header')
<h1>dashbord</h1>
@stop

@section('content')

    <!-- カードの表示 -->
    <div class="row">
        <!-- フォーイーチの分 -->
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">＃</h3>
                </div>
                <div class="card-body">
                    <p>＃</p>
                    <a href="＃" class="btn btn-primary">More info</a>
                </div>
            </div>
        </div>
        <!-- フォイーチエンド -->
    </div>
@stop

@section('sidebar')
    @include('vendor.adminlte.partials.sidebar')
@stop

@section('css')
<style>
.card-body {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}

.btn-group .btn {
    margin-left: 5px;
    border-radius: 50%;
    padding: 10px;
    font-size: 18px;
}
</style>
@stop
