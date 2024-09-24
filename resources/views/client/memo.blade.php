@extends('adminlte::page')

@section('title', 'マイホームNOTE')

@section('content')

<section class="content-header d-flex">
    <h1>プロフィール</h1>
        <a href="{{route('client.edit') }}" class="btn  btn-edit  ">編集</a> </button>
</section>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">家族構成</h3>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap custom-table">
                        <thead>
                            <tr>
                                <th class="col-priority">大人</th>
                                <th class="col-request">子供</th>
                                <th class="col-edit">ペット</th>
                            </tr>
                        </thead>
                        <tbody>
                                <tr>
                                    <td class="col-priority">
                                        <i>{{$client->adult_count}}</i>
                                    </td>
                                    <td class="col-priority">
                                        <i>{{$client->client_count}}</i>
                                    </td>
                                    <td class="col-priority">
                                        <i>{{$client->pet}}</i>
                                    </td>
                                </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">土地予算</h3>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap custom-table">
                        <thead>
                            <tr>
                                <th class="col-priority">大人</th>
                                <th class="col-request">子供</th>
                                <th class="col-edit">ペット</th>
                            </tr>
                        </thead>
                        <tbody>
                                <tr>
                                    <td class="col-priority">
                                        <i>{{$client->adult_count}}</i>
                                    </td>
                                    <td class="col-priority">
                                        <i>{{$client->client_count}}</i>
                                    </td>
                                    <td class="col-priority">
                                        <i>{{$client->pet}}</i>
                                    </td>
                                </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
