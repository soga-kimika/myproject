@extends('adminlte::page')

@section('title', 'マイホームNOTE')

@section('content')
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
        <div class="container">
            <section class="content-header">
                <h1>プロフィール</h1>
            </section>

            <section class="content">
                <div class="row">
                    <div class="col-md-12 client-form">
                        <form method="post" action="{{ route('client.store') }}">
                            @csrf 

                            <div class="form-group d-flex">
                                <label class="form-title mr-3">家族構成</label>
                                <div class="flex-grow-1">
                                    <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <label for="adult_count">大人：</label>
                                            <select name="adult_count" id="adult_count" class="form-control input-sm" required>
                                                <option value=""></option>
                                                @foreach(range(1, 5) as $i)
                                                    <option value="{{ $i }}" {{ old('adult_count') == $i ? 'selected' : '' }}>{{ $i }}人</option>
                                                @endforeach
                                                <option value="5">5人以上</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="child_count">子供：</label>
                                            <select name="child_count" id="child_count" class="form-control input-sm" required>
                                                <option value=""></option>
                                                @foreach(range(0, 5) as $i)
                                                    <option value="{{ $i }}" {{ old('child_count') == $i ? 'selected' : '' }}>{{ $i }}人</option>
                                                @endforeach
                                                <option value="5">5人以上</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="pet">ペット：</label>
                                            <select name="pet" id="pet" class="form-control input-sm" required>
                                                <option value=""></option>
                                                <option value="yes" {{ old('pet') == 'yes' ? 'selected' : '' }}>飼っている</option>
                                                <option value="no" {{ old('pet') == 'no' ? 'selected' : '' }}>飼っていない</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group d-flex">
                                <label class="form-title mr-3">土地・建物</label>
                                <div class="flex-grow-1">
                                    <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <label for="land_area">土地の坪数</label>
                                            <select name="land_area" class="form-control input-sm" required>
                                                <option value=""></option>
                                                @foreach(range(20, 100, 10) as $area)
                                                    <option value="{{ $area }}" {{ old('land_area') == $area ? 'selected' : '' }}>{{ $area }}坪前後</option>
                                                @endforeach
                                                <option value="100">100坪以上</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="building_area">建物の坪数</label>
                                            <select name="building_area" class="form-control input-sm" required>
                                                <option value=""></option>
                                                @foreach(range(20, 100, 10) as $area)
                                                    <option value="{{ $area }}" {{ old('building_area') == $area ? 'selected' : '' }}>{{ $area }}坪前後</option>
                                                @endforeach
                                                <option value="100">100坪以上</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="floors">階数</label>
                                            <select name="floors" class="form-control input-sm" required>
                                                <option value=""></option>
                                                @foreach(range(1, 5) as $floor)
                                                    <option value="{{ $floor }}" {{ old('floors') == $floor ? 'selected' : '' }}>{{ $floor }}階建</option>
                                                @endforeach
                                                <option value="5">5階建以上</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group d-flex">
                                <label class="form-title mr-3">予算</label>
                                <div class="flex-grow-1">
                                    <div class="form-row">
                                        <div class="col-md-3">
                                            <label>土地予算</label>
                                            <input type="text" name="land_budget" class="form-control input-sm" style="width:100px;" value="{{ old('land_budget') }}" placeholder="500" required> 万円
                                        </div>
                                        <div class="col-md-3">
                                            <label>建物予算</label>
                                            <input type="text" name="building_budget" class="form-control input-sm" style="width:100px;" value="{{ old('building_budget') }}" placeholder="3000" required> 万円
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group d-flex">
                                <label class="form-title mr-3">駐車スペース</label>
                                <div class="flex-grow-1">
                                    <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <label for="regularCars">普通車の台数：</label>
                                            <select id="regularCars" name="regularCars" class="form-control input-sm" required>
                                                <option value=""></option>
                                                @foreach(range(0, 3) as $i)
                                                    <option value="{{ $i }}" {{ old('regularCars') == $i ? 'selected' : '' }}>{{ $i }}台</option>
                                                @endforeach
                                                <option value="3">3台以上</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="compactCars">軽自動車の台数：</label>
                                            <select id="compactCars" name="compactCars" class="form-control input-sm" required>
                                                <option value=""></option>
                                                @foreach(range(0, 3) as $i)
                                                    <option value="{{ $i }}" {{ old('compactCars') == $i ? 'selected' : '' }}>{{ $i }}台</option>
                                                @endforeach
                                                <option value="3">3台以上</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="motorcycles">バイクの台数：</label>
                                            <select id="motorcycles" name="motorcycles" class="form-control input-sm" required>
                                                <option value=""></option>
                                                @foreach(range(0, 3) as $i)
                                                    <option value="{{ $i }}" {{ old('motorcycles') == $i ? 'selected' : '' }}>{{ $i }}台</option>
                                                @endforeach
                                                <option value="3">3台以上</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="bicycles">自転車の台数：</label>
                                            <select id="bicycles" name="bicycles" class="form-control input-sm" required>
                                                <option value=""></option>
                                                @foreach(range(0, 3) as $i)
                                                    <option value="{{ $i }}" {{ old('bicycles') == $i ? 'selected' : '' }}>{{ $i }}台</option>
                                                @endforeach
                                                <option value="3">3台以上</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-title">建築エリア</label>
                                <input type="text" name="construction_area" class="form-control input-sm" placeholder="城北" value="{{ old('construction_area') }}" required>
                            </div>

                            <div class="form-group">
                                <label class="form-title">建築希望日</label>
                                <input type="date" id="date" name="date" class="form-control input-sm" value="{{ old('date') }}" required>
                            </div>

                            <div class="form-group">
                                <label class="form-title">今の家で不満に思っていること</label>
                                <textarea name="current_home_issues" class="form-control input-sm" placeholder="今のお家の不便なこと・不満なことを記入してください" rows="10" required>{{ old('current_home_issues') }}</textarea>
                            </div>

                            <div class="text-center mt-4">
                                <button type="submit" class="btn bg-green"><i class="fa fa-thumbs-up"></i> 確定</button>
                            </div>
                        </form>
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
