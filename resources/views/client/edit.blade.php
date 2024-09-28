@extends('adminlte::page')

@section('title', 'マイホームNOTE')

@section('content')
    {{-- エラー表示 --}}
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
    <div class="container-fluid">
        <div class="container ">
            {{-- ヘッダー --}}
            <section class="content-header">
                <h1>プロフィール</h1>
            </section>

            {{-- メイン --}}
            <section class="content">
                <div class="row">
                    <div class="col-md-12 client-form  ">
                        <form id="xxxForm" method="post" action="{{route('client.store')}}">
                            @csrf 
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
                                                    <option value="1" {{$client->adult_count == 1 ? 'selected' : '' }}>1人</option>
                                                    <option value="2" {{$client->adult_count == 2 ? 'selected' : '' }}>2人</option>
                                                    <option value="3" {{$client->adult_count == 3 ? 'selected' : '' }}>3人</option>
                                                    <option value="4" {{$client->adult_count == 4 ? 'selected' : '' }}>4人</option>
                                                    <option value="5" {{$client->adult_count  >=5 ? 'selected' : '' }}>5人以上</option>
                                                </select>
                                            </div>
                                            <div class="form-group ml-2">
                                                <label for="child_count">子供：</label>
                                                <select name="child_count" id="child_count" class="form-control input-sm">
                                                    <option value="">選択してください</option>
                                                    <option value="0" {{$client->child_count == 0 ? 'selected' : '' }}>０人</option>
                                                    <option value="1" {{$client->child_count == 1 ? 'selected' : '' }}>1人</option>
                                                    <option value="2" {{$client->child_count == 2 ? 'selected' : '' }}>2人</option>
                                                    <option value="3" {{$client->child_count == 3 ? 'selected' : '' }}>3人</option>
                                                    <option value="4" {{$client->child_count == 4 ? 'selected' : '' }}>4人</option>
                                                    <option value="5" {{$client->child_count >=5 ? 'selected' : '' }}>5人以上</option>
                                                </select> 
                                            </div>
                                               <div class="form-group ml-2">
                                                <label for="pet">ペット：</label>
                                                <select name="pet" id="pet" class="form-control input-sm">
                                                    <option value="">選択してください</option>
                                                    <option value="yes"  {{$client->pet == 'yes' ? 'selected' : '' }}>飼っている</option>
                                                    <option value="no"  {{$client->pet == 'no' ? 'selected' : '' }}>飼っていない</option>
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
                                                <input type="radio" class="form-check-input" name="land_budget_exists" id="land-budget-yes" value="exists"
                                                {{$client ->land_budget_exists == 'exists' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="land-budget-yes">有</label>
                                                <input type="radio" class="form-check-input" name="land_budget_exists" id="land-budget-no" value="not-exists"
                                                {{$client ->land_budget_exists == 'not-exists' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="land-budget-no">無</label>
                                            </div>
                                            <input type="text" name="land_budget" class="form-control input-sm ml-2" style="width:100px;" placeholder="500" value="{{$client->land_budget}}"/> 万円
                                        </div>
                                    </td>
                                    <th class="bg-summer-sky">建物予算</th>
                                    <td>
                                        <div class="form-inline">
                                        <input type="text" name="building_budget" class="form-control input-sm ml-2" style="width:100px;" placeholder="3000" value="{{$client->building_budget}}"/> 万円
                                    </td>
                                </tr>
                                
                                <tr>
                                    <th class="bg-summer-sky">土地の坪数</th>
                                    <td>
                                        <select name="land_area" class="form-control input-sm">
                                            <option value="">選択してください</option>
                                            <option value="20" {{$client->land_area == '20' ? 'selected' : '' }}>20坪前後</option>
                                            <option value="30" {{$client->land_area == '30' ? 'selected' : '' }}>30坪前後</option>
                                            <option value="40" {{$client->land_area == '40' ? 'selected' : '' }}>40坪前後</option>
                                            <option value="50" {{$client->land_area == '50' ? 'selected' : '' }}>50坪前後</option>
                                            <option value="60" {{$client->land_area == '60' ? 'selected' : '' }}>60坪前後</option>
                                            <option value="70" {{$client->land_area == '70' ? 'selected' : '' }}>70坪前後</option>
                                            <option value="80" {{$client->land_area == '80' ? 'selected' : '' }}>80坪前後</option>
                                            <option value="90" {{$client->land_area == '90' ? 'selected' : '' }}>90坪前後</option>
                                            <option value="100" {{$client->land_area >= '100' ? 'selected' : '' }}>100坪以上</option>
                                        </select>
                                    </td>
                                    <th class="bg-summer-sky">建物の坪数</th>
                                    <td>
                                        <select name="building_area" class="form-control input-sm">
                                            <option value="">選択してください</option>
                                            <option value="20" {{$client->building_area == '20' ? 'selected' : '' }}>20坪前後</option>
                                            <option value="30" {{$client->building_area == '30' ? 'selected' : '' }}>30坪前後</option>
                                            <option value="40" {{$client->building_area == '40' ? 'selected' : '' }}>40坪前後</option>
                                            <option value="50" {{$client->building_area == '50' ? 'selected' : '' }}>50坪前後</option>
                                            <option value="60" {{$client->building_area == '60' ? 'selected' : '' }}>60坪前後</option>
                                            <option value="70" {{$client->building_area == '70' ? 'selected' : '' }}>70坪前後</option>
                                            <option value="80" {{$client->building_area == '80' ? 'selected' : '' }}>80坪前後</option>
                                            <option value="90" {{$client->building_area == '90' ? 'selected' : '' }}>90坪前後</option>
                                            <option value="100" {{$client->building_area >= '100' ? 'selected' : '' }}>100坪以上</option>
                                        </select>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <th class="bg-summer-sky">階数</th>
                                    <td>
                                        <select name="floors" class="form-control input-sm">
                                            <option value="">選択してください</option>
                                            <option value="1" {{$client->floors == '1' ? 'selected' : '' }}>1階建</option>
                                            <option value="2" {{$client->floors == '2' ? 'selected' : '' }}>2階建</option>
                                            <option value="3" {{$client->floors == '3' ? 'selected' : '' }}>3階建</option>
                                            <option value="4" {{$client->floors == '4' ? 'selected' : '' }}>4階建</option>
                                            <option value="5" {{$client->floors >= '5' ? 'selected' : '' }}>5階建以上</option>
                                        </select>
                                    </td>
                                    <th class="bg-summer-sky">間取り</th>
                                    <td>
                                        <select name="layout" class="form-control input-sm">
                                            <option value="">選択してください</option>
                                            <option value="2LDK" {{$client->layout == '2LDK' ? 'selected' :'' }}>2LDK</option>
                                            <option value="3LDK" {{$client->layout == '3LDK' ? 'selected' :'' }}>3LDK</option>
                                            <option value="4LDK" {{$client->layout == '4LDK' ? 'selected' :'' }}>4LDK</option>
                                            <option value="5LDK" {{$client->layout == '5LDK' ? 'selected' :'' }}>5LDK</option>
                                            <option value="6LDK" {{$client->layout == '6LDK' ? 'selected' :'' }}>6LDK</option>
                                            <option value="7LDK" {{$client->layout >='7LDK' ? 'selected' : '' }}>7LDK以上</option>
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
                                                    <option value="0" {{$client->regularCars == '0' ? 'selected' : '' }}>0台</option>
                                                    <option value="1" {{$client->regularCars == '1' ? 'selected' : '' }}>1台</option>
                                                    <option value="2" {{$client->regularCars == '2' ? 'selected' : '' }}>2台</option>
                                                    <option value="3" {{$client->regularCars >= '3' ? 'selected' : '' }}>3台以上</option>
                                                </select>
                                            </div>
                                            <div class="form-group ml-2">
                                                <label for="compactCars">軽自動車の台数：</label>
                                                <select id="compactCars" name="compactCars" class="form-control input-sm">
                                                    <option value="">選択してください</option>
                                                    <option value="0" {{$client->compactCars == '0'  ?'selected' : '' }}>0台</option>
                                                    <option value="1" {{$client->compactCars == '1'  ?'selected' : '' }}>1台</option>
                                                    <option value="2" {{$client->compactCars == '2'  ?'selected' : '' }}>2台</option>
                                                    <option value="3" {{$client->compactCars >= '3'  ?'selected' : '' }}>3台以上</option>
                                                </select>
                                            </div>
                                            <div class="form-group ml-2">
                                                <label for="motorcycles">バイクの台数：</label>
                                                <select id="motorcycles" name="motorcycles" class="form-control input-sm">
                                                    <option value="">選択してください</option>
                                                    <option value="0" {{$client->motorcycles == '0' ? 'selected' : '' }}>0台</option>
                                                    <option value="1" {{$client->motorcycles == '1' ? 'selected' : '' }}>1台</option>
                                                    <option value="2" {{$client->motorcycles == '2' ? 'selected' : '' }}>2台</option>
                                                    <option value="3" {{$client->motorcycles >= '3'  ? 'selected' : '' }}>3台以上</option>
                                                </select>
                                            </div>
                                            <div class="form-group ml-2">
                                                <label for="bicycles">自転車の台数：</label>
                                                <select id="bicycles" name="bicycles" class="form-control input-sm">
                                                    <option value="">選択してください</option>
                                                    <option value="0" {{$client->bicycles == '0' ? 'selected' : '' }}>0台</option>
                                                    <option value="1" {{$client->bicycles == '1' ? 'selected' : '' }}>1台</option>
                                                    <option value="2" {{$client->bicycles == '2' ? 'selected' : '' }}>2台</option>
                                                    <option value="3" {{$client->bicycles >= '3' ? 'selected' : '' }}>3台以上</option>
                                                    
                                                </select>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <th class="bg-summer-sky">建築エリア</th>
                                    <td>
                                        <div class="form-inline">
                                        <input type="text" name="construction_area" class="form-control input-sm" placeholder="城北" value="{{$client->construction_area}}"/>エリア
                                    </td>
                                    <th class="bg-summer-sky">建築希望日</th>
                                    <td>
                                        <input type="date" id="date" name="date" class="form-control input-sm" value="{{$client->date}}">
                                    </td>
                                </tr>
                                
                                <tr>
                                    <th class="bg-summer-sky">今の家で不満に思っていること</th>
                                    <td colspan="3">
                                        <textarea name="current_home_issues" class="form-control input-sm" placeholder="今のお家の不便なこと・不満なことを記入してください" rows="10" >{{$client->current_home_issues}} </textarea>
                                    </td>
                                </tr>
                            </table>
                            </form>
                            <div class="text-center mt-4">
                            <form action="{{ route('client.update') }}" method="POST">
                                 @csrf
                                 @method('PUT')
                                <button type="submit" class="btn bg-green"><i class="fa fa-thumbs-up"></i> 更新</button>
                        </form>
                                <button type="button" class="btn bg-orange" onclick="window.history.back();"><i class="fa fa-close"></i> キャンセル</button>
                            </div>
                        
                    </div>
                </div>
            </section>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('/css/item/index.css') }}">
@stop


@section('js')
@stop
