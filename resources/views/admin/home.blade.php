@extends('adminlte::page')

@section('title', '管理者ホーム画面')

@section('content_header')
    <h1>管理用マイホームNOTE</h1>
@stop   

@section('content')
<section class="content">
    <div class="row justify-content-center text-center">
        <div class="col-auto">
            <a href="{{ route('admin.users.index') }}" title="ユーザー管理" class="btn btn-link">
                <i class="fas fa-users home-icon fa-2x management-home-ico"></i>
                <p>user</p>
            </a>
        </div>
        <div class="col-auto">
            <a href="{{ route('admin.clients.index') }}" title="クライアント管理" class="btn btn-link">
                <i class="fas fa-address-book home-icon fa-2x management-home-ico"></i>
                <p>Client</p>
            </a>    
        </div>
        <div class="col-auto">
            <a href="{{ route('admin.items.index') }}" title="アイテム管理" class="btn btn-link">
                <i class="fas fa-clipboard-list home-icon fa-2x management-home-ico"></i>
                <p>Item</p>
            </a>
        </div>
        <div class="col-auto">
            <a href="{{ route('admin.homeStartupItems.index') }}" title="ウィッシュリスト管理" class="btn btn-link">
                <i class="fas fa-list home-icon fa-2x management-home-ico"></i>
                <p>Wishlist
                </p>
            </a>
        </div>
        <div class="col-auto">
            <a href="{{ route('admin.galleries.index') }}" title="ギャラリー管理" class="btn btn-link">
                <i class="fas fa-images home-icon fa-2x management-home-ico"></i>
                <p>Gallery</p>
            </a>
        </div>
    </div>
</section>
@stop

@section('css')
<link rel="stylesheet" href="{{ asset('/css/item/index.css') }}">
@stop

@section('js')
<script>
</script>
@stop
