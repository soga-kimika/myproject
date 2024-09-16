@extends('adminlte::page')

@section('title', 'マイホームNOTE')

@section('content')
    <!-- エラー表示 -->
    <div class="row">
        <div class="col-md-12">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>

    <!-- Full Width Column -->
    <div class="container-fluid">
        <div class="container">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>施主情報</h1>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <form id="xxxForm" method="post" action="{{route('client.store')}}">
                            @csrf <!-- CSRFトークンの追加 -->

                            <table class="table table-bordered text-sm">
                                <colgroup>
                                    <col width="15%"/>
                                    <col width="35%"/>
                                    <col width="15%"/>
                                    <col width="35%"/>
                                </colgroup>
                                
                                <tr>
                                    <th class="bg-summer-sky">家族構成</th>
                                    <td colspan="3">
                                        <div class="form-inline">
                                            <div class="form-group">
                                                <label for="adult_count">大人：</label>
                                                    <i>{{$client->adult_count}}</i>
                                            </div>
                                            <div class="form-group ml-2">
                                                <label for="child_count">子供：</label> 
                                                <i>{{$client->child_count}}</i>
                                           
                                            </div>
                                                <div class="form-group ml-2">
                                                <label for="pet">ペット：</label>
                                                <i>{{$client->pet}}</i>
                                              
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <th class="bg-summer-sky">土地予算</th>
                                    <td>
                             
                                <div class="form-check form-check-inline">
                                    @if ($client->land_budget_exists == 'exists')
                                        <span>有</span>
                                    @elseif ($client->land_budget_exists == 'not-exists')
                                        <span>無</span>
                                    @endif
                                </div>
                                    
                                    <i>{{$client->land_budget}}万円</i>
                                        </div>
                                    </td>
                                    <th class="bg-summer-sky">建物予算</th>
                                    <td>
                                        <div class="form-inline">
                                        <i>{{$client->building_budget}}万円</i>
                                </tr>
                                
                                <tr>
                                    <th class="bg-summer-sky">土地の坪数</th>
                                    <td>
                                    <i>{{$client->land_area}}</i>
                                           
                                    </td>
                                    <th class="bg-summer-sky">建物の坪数</th>
                                    <td>
                                        <i>{{$client->building_area}}</i>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <th class="bg-summer-sky">階数</th>
                                    <td>
                                    <i>{{$client->floors}}</i>
                                    </td>
                                    <th class="bg-summer-sky">間取り</th>
                                    <td>
                                    <i>{{$client->layout}}</i>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <th class="bg-summer-sky">駐車スペース</th>
                                    <td colspan="3">
                                        <div class="form-inline">
                                            <div class="form-group">
                                                <label for="regularCars">普通車の台数：</label>
                                                <i>{{$client->regularCars}}</i>
                                            </div>
                                            <div class="form-group ml-2">
                                                <label for="compactCars">軽自動車の台数：</label>
                                                <i>{{$client->compactCars}}</i>
                                            </div>
                                            <div class="form-group ml-2">
                                                <label for="motorcycles">バイクの台数：</label>
                                                <i>{{$client->motorcycles}}</i>
                                            </div>
                                            <div class="form-group ml-2">
                                                <label for="bicycles">自転車の台数：</label>
                                                <i>{{$client->client}}</i>
                                                    
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <th class="bg-summer-sky">建築エリア</th>
                                    <td>
                                        <div class="form-inline">
                                        <i>{{$client->construction_area}}</i>
                                     </td>
                                    <th class="bg-summer-sky">建築希望日</th>
                                    <td>
                                        <i>{{$client->date}}</i>
                                     </td>
                                </tr>
                                
                                <tr>
                                    <th class="bg-summer-sky">今の家で不満に思っていること</th>
                                    <td colspan="3">
                                       <i>{{$client->current_home_issues}} </i>
                                    </td>
                                </tr>
                            </table>
                            <div class="text-center mt-4">
                                <a href="{{route('client.edit') }}" class="btn bg-green "></a>
                                <i class="fa fa-thumbs-up"></i> 編集</button>
                            </div>

                        </form>
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.container -->
    </div>
@stop

@section('css')
    <!-- Custom CSS if needed -->
    <style>
        .form-inline .form-group {
            margin-right: 10px;
        }
    </style>
@stop

@section('js')
    <!-- Custom JS if needed -->
@stop
