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
                <h1>プロフィール</h1>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-md-12 client-form ">
                        <form method="post" action="{{ route('client.store') }}">
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
                                                <select name="adult_count" id="adult_count" class="form-control input-sm" required>
                                                    <option value="">選択してください</option>
                                                    <option value="1" {{ old('adult_count') == 1 ? 'selected' : '' }}>1人</option>
                                                    <option value="2" {{ old('adult_count') == 2 ? 'selected' : '' }}>2人</option>
                                                    <option value="3" {{ old('adult_count') == 3 ? 'selected' : '' }}>3人</option>
                                                    <option value="4" {{ old('adult_count') == 4 ? 'selected' : '' }}>4人</option>
                                                    <option value="5" {{ old('adult_count') == 5 ? 'selected' : '' }}>5人以上</option>
                                                </select>
                                            </div>
                                            <div class="form-group ml-2">
                                                <label for="child_count">子供：</label>
                                                <select name="child_count" id="child_count" class="form-control input-sm" required>
                                                    <option value="">選択してください</option>
                                                    <option value=0 {{ old('child_count') ===0 ? 'selected' : '' }}>０人</option>
                                                    <option value="1" {{ old('child_count') == 1 ? 'selected' : '' }}>1人</option>
                                                    <option value="2" {{ old('child_count') == 2 ? 'selected' : '' }}>2人</option>
                                                    <option value="3" {{ old('child_count') == 3 ? 'selected' : '' }}>3人</option>
                                                    <option value="4" {{ old('child_count') == 4 ? 'selected' : '' }}>4人</option>
                                                    <option value="5" {{ old('child_count') == 5 ? 'selected' : '' }}>5人以上</option>
                                                </select>
                                            </div>
                                            <div class="form-group ml-2">
                                                <label for="pet">ペット：</label>
                                                <select name="pet" id="pet" class="form-control input-sm" required>
                                                    <option value="">選択してください</option>
                                                    <option value="yes" {{ old('pet') == 'yes' ? 'selected' : '' }}>飼っている</option>
                                                    <option value="no" {{ old('pet') == 'no' ? 'selected' : '' }}>飼っていない</option>
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
                                                <input type="radio" class="form-check-input" name="land_budget_exists" id="land-budget-yes" value="exists" required {{ old('land_budget_exists') == 'exists' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="land-budget-yes">有</label>
                                                <input type="radio" class="form-check-input" name="land_budget_exists" id="land-budget-no" value="not-exists" required {{ old('land_budget_exists') == 'not-exists' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="land-budget-no">無</label>
                                            </div>
                                            <input type="text" name="land_budget" class="form-control input-sm ml-2" style="width:100px;" value="{{ old('land_budget') }}" placeholder="500" required> 万円
                                        </div>
                                    </td>
                                    <th class="bg-summer-sky">建物予算</th>
                                    <td>
                                        <div class="form-inline">
                                            <input type="text" name="building_budget" class="form-control input-sm ml-2" style="width:100px;" value="{{ old('building_budget') }}" placeholder="3000" required> 万円
                                        </div>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <th class="bg-summer-sky">土地の坪数</th>
                                    <td>
                                        <select name="land_area" class="form-control input-sm" required>
                                            <option value="">選択してください</option>
                                            <option value="20" {{ old('land_area') == 20 ? 'selected' : '' }}>20坪前後</option>
                                            <option value="30" {{ old('land_area') == 30 ? 'selected' : '' }}>30坪前後</option>
                                            <option value="40" {{ old('land_area') == 40 ? 'selected' : '' }}>40坪前後</option>
                                            <option value="50" {{ old('land_area') == 50 ? 'selected' : '' }}>50坪前後</option>
                                            <option value="60" {{ old('land_area') == 60 ? 'selected' : '' }}>60坪前後</option>
                                            <option value="70" {{ old('land_area') == 70 ? 'selected' : '' }}>70坪前後</option>
                                            <option value="80" {{ old('land_area') == 80 ? 'selected' : '' }}>80坪前後</option>
                                            <option value="90" {{ old('land_area') == 90 ? 'selected' : '' }}>90坪前後</option>
                                            <option value="100" {{ old('land_area') == 100 ? 'selected' : '' }}>100坪以上</option>
                                        </select>
                                    </td>
                                    <th class="bg-summer-sky">建物の坪数</th>
                                    <td>
                                        <select name="building_area" class="form-control input-sm" required>
                                            <option value="">選択してください</option>
                                            <option value="20" {{ old('building_area') == 20 ? 'selected' : '' }}>20坪前後</option>
                                            <option value="30" {{ old('building_area') == 30 ? 'selected' : '' }}>30坪前後</option>
                                            <option value="40" {{ old('building_area') == 40 ? 'selected' : '' }}>40坪前後</option>
                                            <option value="50" {{ old('building_area') == 50 ? 'selected' : '' }}>50坪前後</option>
                                            <option value="60" {{ old('building_area') == 60 ? 'selected' : '' }}>60坪前後</option>
                                            <option value="70" {{ old('building_area') == 70 ? 'selected' : '' }}>70坪前後</option>
                                            <option value="80" {{ old('building_area') == 80 ? 'selected' : '' }}>80坪前後</option>
                                            <option value="90" {{ old('building_area') == 90 ? 'selected' : '' }}>90坪前後</option>
                                            <option value="100" {{ old('building_area') == 100 ? 'selected' : '' }}>100坪以上</option>
                                        </select>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <th class="bg-summer-sky">階数</th>
                                    <td>
                                        <select name="floors" class="form-control input-sm" required>
                                            <option value="">選択してください</option>
                                            <option value="1" {{ old('floors') == 1 ? 'selected' : '' }}>1階建</option>
                                            <option value="2" {{ old('floors') == 2 ? 'selected' : '' }}>2階建</option>
                                            <option value="3" {{ old('floors') == 3 ? 'selected' : '' }}>3階建</option>
                                            <option value="4" {{ old('floors') == 4 ? 'selected' : '' }}>4階建</option>
                                            <option value="5" {{ old('floors') == 5 ? 'selected' : '' }}>5階建以上</option>
                                        </select>
                                    </td>
                                    <th class="bg-summer-sky">間取り</th>
                                    <td>
                                        <select name="layout" class="form-control input-sm" required>
                                            <option value="">選択してください</option>
                                            <option value="2LDK" {{ old('layout') == '2LDK' ? 'selected' : '' }}>2LDK</option>
                                            <option value="3LDK" {{ old('layout') == '3LDK' ? 'selected' : '' }}>3LDK</option>
                                            <option value="4LDK" {{ old('layout') == '4LDK' ? 'selected' : '' }}>4LDK</option>
                                            <option value="5LDK" {{ old('layout') == '5LDK' ? 'selected' : '' }}>5LDK</option>
                                            <option value="6LDK" {{ old('layout') == '6LDK' ? 'selected' : '' }}>6LDK</option>
                                            <option value="7LDK" {{ old('layout') == '7LDK' ? 'selected' : '' }}>7LDK以上</option>
                                        </select>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <th class="bg-summer-sky">駐車スペース</th>
                                    <td colspan="3">
                                        <div class="form-inline">
                                            <div class="form-group">
                                                <label for="regularCars">普通車の台数：</label>
                                                <select id="regularCars" name="regularCars" class="form-control input-sm" required>
                                                    <option value="">選択してください</option>
                                                    <option value=0 {{ old('regularCars') ===0 ? 'selected' : '' }}>0台</option>
                                                    <option value="1台" {{ old('regularCars') == '1台' ? 'selected' : '' }}>1台</option>
                                                    <option value="2台" {{ old('regularCars') == '2台' ? 'selected' : '' }}>2台</option>
                                                    <option value="3台" {{ old('regularCars') == '3台' ? 'selected' : '' }}>3台以上</option>
                                                </select>
                                            </div>
                                            <div class="form-group ml-2">
                                                <label for="compactCars">軽自動車の台数：</label>
                                                <select id="compactCars" name="compactCars" class="form-control input-sm" required>
                                                    <option value="">選択してください</option>
                                                    <option value=0 {{ old('compactCars') === 0 ? 'selected' : '' }}>0台</option>
                                                    <option value="1" {{ old('compactCars') == 1 ? 'selected' : '' }}>1台</option>
                                                    <option value="2" {{ old('compactCars') == 2 ? 'selected' : '' }}>2台</option>
                                                    <option value="3" {{ old('compactCars') == 3 ? 'selected' : '' }}>3台以上</option>
                                                </select>
                                            </div>
                                            <div class="form-group ml-2">
                                                <label for="motorcycles">バイクの台数：</label>
                                                <select id="motorcycles" name="motorcycles" class="form-control input-sm" required>
                                                    <option value="">選択してください</option>
                                                    <option value=0 {{ old('motorcycles') ===0 ? 'selected' : '' }}>0台</option>
                                                    <option value="1" {{ old('motorcycles') == 1 ? 'selected' : '' }}>1台</option>
                                                    <option value="2" {{ old('motorcycles') == 2 ? 'selected' : '' }}>2台</option>
                                                    <option value="3" {{ old('motorcycles') == 3 ? 'selected' : '' }}>3台以上</option>
                                                </select>
                                            </div>
                                            <div class="form-group ml-2">
                                                <label for="bicycles">自転車の台数：</label>
                                                <select id="bicycles" name="bicycles" class="form-control input-sm" required>
                                                    <option value="">選択してください</option>
                                                    <option value=0 {{ old('bicycles') ===0 ? 'selected' : '' }}>0台</option>
                                                    <option value="1" {{ old('bicycles') == 1 ? 'selected' : '' }}>1台</option>
                                                    <option value="2" {{ old('bicycles') == 2 ? 'selected' : '' }}>2台</option>
                                                    <option value="3" {{ old('bicycles') == 3 ? 'selected' : '' }}>3台以上</option>
                                                </select>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <th class="bg-summer-sky">建築エリア</th>
                                    <td>
                                        <div class="form-inline">
                                            <input type="text" name="construction_area" class="form-control input-sm" placeholder="城北" value="{{ old('construction_area') }}" required>エリア
                                        </div>
                                    </td>
                                    <th class="bg-summer-sky">建築希望日</th>
                                    <td>
                                        <input type="date" id="date" name="date" class="form-control input-sm" value="{{ old('date') }}" required>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <th class="bg-summer-sky">今の家で不満に思っていること</th>
                                    <td colspan="3">
                                        <textarea name="current_home_issues" class="form-control input-sm" placeholder="今のお家の不便なこと・不満なことを記入してください" rows="10" required>{{ old('current_home_issues') }}</textarea>
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
    <link rel="stylesheet" href="{{ asset('/css/item/index.css') }}">
@stop

@section('js')
    <!-- Custom JS if needed -->
@stop
