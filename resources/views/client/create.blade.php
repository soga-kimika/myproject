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
                        <form  method="post" action="{{route('client.store')}}">
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
                                                <select name="adult_count" id="adult_count" class="form-control input-sm">
                                                    <option value="">選択してください</option>
                                                    <option value="1" >1人</option>
                                                    <option value="2" >2人</option>
                                                    <option value="3" >3人</option>
                                                    <option value="4" >4人</option>
                                                    <option value="5" >5人以上</option>
                                                </select>
                                            </div>
                                            <div class="form-group ml-2">
                                                <label for="child_count">子供：</label>
                                                <select name="child_count" id="child_count" class="form-control input-sm">
                                                    <option value="">選択してください</option>
                                                    <option value="0" >０人</option>
                                                    <option value="1" >1人</option>
                                                    <option value="2" >2人</option>
                                                    <option value="3" >3人</option>
                                                    <option value="4" >4人</option>
                                                    <option value="5" > 5人以上</option>
                                                </select> 
                                            </div>
                                                 <div class="form-group ml-2">
                                                <label for="pet">ペット：</label>
                                                <select name="pet" id="pet" class="form-control input-sm">
                                                    <option value="">選択してください</option>
                                                    <option value="yes"  >飼っている</option>
                                                    <option value="no" >飼っていない</option>
                                                </select>
                                            </div>
                                        </div>  
                                    </td>
                                </tr>
                                
                                <tr>
                                    <th class="bg-summer-sky">土地予算</th>
                                    <td>
                                        <div class="form-inline">
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" name="land_budget_exists" id="land-budget-yes" value="exists" >
                                                <label class="form-check-label" for="land-budget-yes">有</label>
                                                <input type="radio" class="form-check-input" name="land_budget_exists" id="land-budget-no" value="not-exists">
                                                <label class="form-check-label" for="land-budget-no">無</label>
                                            </div>
                                            <input type="text" name="land_budget" class="form-control input-sm ml-2" style="width:100px;" placeholder="500"/> 万円
                                        </div>
                                    </td>
                                    <th class="bg-summer-sky">建物予算</th>
                                    <td>
                                        <div class="form-inline">
                                        <input type="text" name="building_budget" class="form-control input-sm ml-2" style="width:100px;" placeholder="3000" /> 万円
                                    </td>
                                </tr>
                                
                                <tr>
                                    <th class="bg-summer-sky">土地の坪数</th>
                                    <td>
                                        <select name="land_area" class="form-control input-sm">
                                            <option value="">選択してください</option>
                                            <option value="20" >20坪前後</option>
                                            <option value="30" >30坪前後</option>
                                            <option value="40" >40坪前後</option>
                                            <option value="50" >50坪前後</option>
                                            <option value="60" >60坪前後</option>
                                            <option value="70" >70坪前後</option>
                                            <option value="80" >80坪前後</option>
                                            <option value="90" >90坪前後</option>
                                            <option value="100" >100坪以上</option>
                                        </select>
                                    </td>
                                    <th class="bg-summer-sky">建物の坪数</th>
                                    <td>
                                        <select name="building_area" class="form-control input-sm">
                                            <option value="">選択してください</option>
                                            <option value="20" >20坪前後</option>
                                            <option value="30" >30坪前後</option>
                                            <option value="40" >40坪前後</option>
                                            <option value="50" >50坪前後</option>
                                            <option value="60" >60坪前後</option>
                                            <option value="70" >70坪前後</option>
                                            <option value="80" >80坪前後</option>
                                            <option value="90" >90坪前後</option>
                                            <option value="100" >100坪以上</option>
                                        </select>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <th class="bg-summer-sky">階数</th>
                                    <td>
                                        <select name="floors" class="form-control input-sm">
                                            <option value="">選択してください</option>
                                            <option value="1" >1階建</option>
                                            <option value="2" >2階建</option>
                                            <option value="3" >3階建</option>
                                            <option value="4" >4階建</option>
                                            <option value="5" >5階建以上</option>
                                        </select>
                                    </td>
                                    <th class="bg-summer-sky">間取り</th>
                                    <td>
                                        <select name="layout" class="form-control input-sm">
                                            <option value="">選択してください</option>
                                            <option value="2LDK" >2LDK</option>
                                            <option value="3LDK" >3LDK</option>
                                            <option value="4LDK" >4LDK</option>
                                            <option value="5LDK" >5LDK</option>
                                            <option value="6LDK" >6LDK</option>
                                            <option value="7LDK" >7LDK以上</option>
                                        </select>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <th class="bg-summer-sky">駐車スペース</th>
                                    <td colspan="3">
                                        <div class="form-inline">
                                            <div class="form-group">
                                                <label for="regularCars">普通車の台数：</label>
                                                <select id="regularCars" name="regularCars" class="form-control input-sm">
                                                    <option value="">選択してください</option>
                                                    <option value="0" >0台</option>
                                                    <option value="1" >1台</option>
                                                    <option value="2" >2台</option>
                                                    <option value="3" >3台以上</option>
                                                </select>
                                            </div>
                                            <div class="form-group ml-2">
                                                <label for="compactCars">軽自動車の台数：</label>
                                                <select id="compactCars" name="compactCars" class="form-control input-sm">
                                                    <option value="">選択してください</option>
                                                    <option value="0" >0台</option>
                                                    <option value="1" >1台</option>
                                                    <option value="2" >2台</option>
                                                    <option value="3" >3台以上</option>
                                                </select>
                                            </div>
                                            <div class="form-group ml-2">
                                                <label for="motorcycles">バイクの台数：</label>
                                                <select id="motorcycles" name="motorcycles" class="form-control input-sm">
                                                    <option value="">選択してください</option>
                                                    <option value="0" >0台</option>
                                                    <option value="1" >1台</option>
                                                    <option value="2" >2台</option>
                                                    <option value="3" >3台以上</option>
                                                </select>
                                            </div>
                                            <div class="form-group ml-2">
                                                <label for="bicycles">自転車の台数：</label>
                                                <select id="bicycles" name="bicycles" class="form-control input-sm">
                                                    <option value="">選択してください</option>
                                                    <option value="0" >0台</option>
                                                    <option value="1" >1台</option>
                                                    <option value="2" >2台</option>
                                                    <option value="3" >3台以上</option>
                                                    
                                                </select>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <th class="bg-summer-sky">建築エリア</th>
                                    <td>
                                        <div class="form-inline">
                                        <input type="text" name="construction_area" class="form-control input-sm" placeholder="城北" />エリア
                                    </td>
                                    <th class="bg-summer-sky">建築希望日</th>
                                    <td>
                                        <input type="date" id="date" name="date" class="form-control input-sm">
                                    </td>
                                </tr>
                                
                                <tr>
                                    <th class="bg-summer-sky">今の家で不満に思っていること</th>
                                    <td colspan="3">
                                        <textarea name="current_home_issues" class="form-control input-sm" placeholder="今のお家の不便なこと・不満なことを記入してください" rows="10" ></textarea>
                                    </td>
                                </tr>
                            </table>
                            
                            <div class="text-center mt-4">
                                <button type="submit" class="btn bg-green"><i class="fa fa-thumbs-up"></i> 確定</button>

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
