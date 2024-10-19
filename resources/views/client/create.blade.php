@extends('adminlte::page')

@section('title', 'プロフィール')

@section('content_header')
<h1 class="content-header-client-create">
    <i class="far fa-address-card"></i>プロフィール登録
</h1>
@stop

@section('content')
@include('partials.errors')
<div class="row">
    
    <div class="col-md-12">

<section class="content client-content">
    <form method="post" action="{{ route('clients.store') }}">
        @csrf 

        <div class="row ">
            <div class="col-md-12">
                <div class="card mb-3 client-mb-3">
                    {{-- 入力フォーム --}}  
                    <div class="card-header">
                        <h5 class="form-title"><i class="far fa-user"></i>住む予定の人数</h5>
                    </div>
                    <div class="client-card-body"> 
                        <div class="form-group">
                            <div class="client-form-inline ">
                                <label for="adult_count" class="mr-2">大人</label>
                                <select name="adult_count" id="adult_count" class="form-control mr-3 small-select" required>
                                    <option value="" disabled selected>選択してください</option>
                                    @foreach(range(1, 5) as $i)
                                        <option value="{{ $i }}" {{ old('adult_count') == $i ? 'selected' : '' }}>{{ $i }}人</option>
                                    @endforeach
                                    <option value="6">6人以上</option>
                                </select>
                            </div>
                            <div class="client-form-inline mt-2">
                                <label for="child_count" class="mr-2">子供</label>
                                <select name="child_count" id="child_count" class="form-control mr-3 small-select" required>
                                    <option value="" disabled selected>選択してください</option>
                                    @foreach(range(0, 5) as $i)
                                        <option value="{{ $i }}" {{ old('child_count') === (string)$i ? 'selected' : '' }}>{{ $i }}人</option>
                                    @endforeach
                                    <option value="6">6人以上</option>
                                </select>
                            </div>
                            <div class="client-form-inline  mt-2">  
                                <label for="pet" class="mr-2">ペット</label>
                                <select name="pet" id="pet" class="form-control  mr-3 small-select" required>
                                    <option value="" disabled selected>選択してください</option>
                                    <option value="yes" {{ old('pet') == 'yes' ? 'selected' : '' }}>飼っている</option>
                                    <option value="no" {{ old('pet') == 'no' ? 'selected' : '' }}>飼っていない</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mb-3  client-mb-3">
                    <div class="card-header">
                        <h5 class="form-title"><i class="far fa-map"></i>土地</h5>
                    </div>
                    <div class="client-card-body">
                        <div class="form-group">
                            <div class="client-form-inline justify-content-center">
                                <label for="land_budget_exists">所有地</label>
                                <select name="land_budget_exists" id="land_budget_exists" class="form-control mr-3 small-select" required>
                                    <option value="" disabled selected>選択してください</option>
                                    <option value="yes" {{ old('land_budget_exists') == 'yes' ? 'selected' : '' }}>所有地あり</option>
                                    <option value="no" {{ old('land_budget_exists') == 'no' ? 'selected' : '' }}>所有地なし</option>
                                </select>
                            </div>
                            <div class="client-form-inline justify-content-center mt-2">
                                <label>予算</label>
                                <input type="text" name="land_budget" class="form-control mr-3 small-select" placeholder="例）1500万円" id="land_budget_input" required>
                            </div>
                            <div class="client-form-inline justify-content-center mt-2">
                                <label for="land_area">坪数</label>
                                <select name="land_area" class="form-control  mr-3 small-select" required>
                                    <option value="" disabled selected>選択してください</option>
                                    @foreach(range(20, 90, 10) as $area)
                                        <option value="{{ $area }}" {{ old('land_area') == $area ? 'selected' : '' }}>{{ $area }}坪前後</option>
                                    @endforeach
                                    <option value="100">100坪以上</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mb-3  client-mb-3">
                    <div class="card-header">
                        <h5 class="form-title"><i class="fas fa-home"></i>建物</h5>
                    </div>
                    <div class="client-card-body">
                        <div class="form-group">
                            <div class="client-form-inline justify-content-center">
                                <label>予算</label>
                                <input type="text" name="building_budget" class="form-control mr-3 small-select " placeholder="例）3000万円" required>
                            </div>
                            <div class="client-form-inline justify-content-center mt-2">
                                <label for="building_area">坪数</label>
                                <select name="building_area" class="form-control mr-3 small-select" required>
                                    <option value="" disabled selected>選択してください</option>
                                    @foreach(range(20, 90, 10) as $area)
                                        <option value="{{ $area }}" {{ old('building_area') == $area ? 'selected' : '' }}>{{ $area }}坪前後</option>
                                    @endforeach
                                    <option value="100">100坪以上</option>
                                </select>
                            </div>
                            <div class="client-form-inline justify-content-center mt-2">
                                <label for="floors">階数</label>
                                <select name="floors" class="form-control  mr-3 small-select" required>
                                    <option value="" disabled selected>選択してください</option>
                                    @foreach(range(1, 5) as $floor)
                                        <option value="{{ $floor }}" {{ old('floors') == $floor ? 'selected' : '' }}>{{ $floor }}階建</option>
                                    @endforeach
                                    <option value="6">6階建以上</option>
                                </select>
                            </div>
                            <div class="client-form-inline justify-content-center mt-2">
                                <label for="layout">間取り</label>
                                <select name="layout" class="form-control  mr-3 small-select" required>
                                    <option value="" disabled selected>選択してください</option>
                                    @foreach(range(1, 5) as $layout)
                                        <option value="{{ $layout }}" {{ old('layout') == $layout ? 'selected' : '' }}>{{ $layout }}LDK</option>
                                    @endforeach
                                    <option value="6">6LDK以上</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mb-3  client-mb-3">
                    <div class="card-header">
                        <h5 class="form-title"><i class="fas fa-car"></i>駐車場</h5>
                    </div>
                    <div class="client-card-body">
                        <div class="form-group">
                            <div class="client-form-inline justify-content-center mt-2">
                                <label for="regularCars">普通車</label>
                                <select id="regularCars" name="regularCars" class="form-control mr-3 small-select" required>
                                    <option value="" disabled selected>選択してください</option>
                                    @foreach(range(0, 3) as $i)
                                        <option value="{{ $i }}" {{ old('regularCars') === (string)$i ? 'selected' : '' }}>{{ $i }}台</option>
                                    @endforeach
                                    <option value="4">4台以上</option>
                                </select>
                            </div>
                            <div class="client-form-inline justify-content-center mt-2">
                                <label for="compactCars">軽自動車</label>
                                <select id="compactCars" name="compactCars" class="form-control mr-3 small-select" required>
                                    <option value="" disabled selected>選択してください</option>
                                    @foreach(range(0, 3) as $i)
                                        <option value="{{ $i }}" {{ old('compactCars') === (string)$i ? 'selected' : '' }}>{{ $i }}台</option>
                                    @endforeach
                                    <option value="4">4台以上</option>
                                </select>
                            </div>
                            <div class="client-form-inline justify-content-center mt-2">
                                <label for="motorcycles">バイク</label>
                                <select id="motorcycles" name="motorcycles" class="form-control mr-3 small-select" required>
                                    <option value="" disabled selected>選択してください</option>
                                    @foreach(range(0, 3) as $i)
                                        <option value="{{ $i }}" {{ old('motorcycles') === (string)$i ? 'selected' : '' }}>{{ $i }}台</option>
                                    @endforeach
                                    <option value="4">4台以上</option>
                                </select>
                            </div>
                            <div class="client-form-inline justify-content-center mt-2">
                                <label for="bicycles">自転車</label>
                                <select id="bicycles" name="bicycles" class="form-control  mr-3 small-select" required>
                                    <option value="" disabled selected>選択してください</option>
                                    @foreach(range(0, 3) as $i)
                                        <option value="{{ $i }}" {{ old('bicycles') === (string)$i ? 'selected' : '' }}>{{ $i }}台</option>
                                    @endforeach
                                    <option value="4">4台以上</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mb-3  client-mb-3">
                    <div class="card-header">
                        <h5 class="form-title"><i class="fas fa-map-marked-alt"></i>建築希望地</h5>
                    </div>
                    <div class="client-card-body text-center">
                        <div class="form-group">
                            <input type="text" name="construction_area" class="form-control small-select" placeholder="例）城北エリア　北久米方面" >
                        </div>
                    </div>
                </div>

                <div class="card mb-3  client-mb-3">
                    <div class="card-header">
                        <h5 class="form-title"><i class="far fa-calendar-check"></i>完成希望日</h5>
                    </div>
                    <div class="client-card-body">
                        <div class="form-group">
                            <input type="date" name="date" class="form-control small-select">
                        </div>
                    </div>
                </div>

                <div class="card mb-3  client-mb-3">
                    <div class="card-header">
                        <h5 class="form-title"><i class="far fa-thumbs-down"></i>今の家の不満点</h5>
                    </div>
                    <div class="client-card-body text-center">
                        <div class="form-group">
                            <textarea name="current_home_issues" class="form-control small-select" rows="6" placeholder="不満点を入力してください   " ></textarea>
                        </div>
                    </div>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-store ms-2">登録</button>
                </div>
            </div>
        </div>
    </form>
</section>

@stop

@section('css')
<link rel="stylesheet" href="{{ asset('/css/item/index.css') }}">


@stop
@section('js')
<script>
    // DOMの内容がすべて読み込まれた後に実行されるイベントリスナーを追加
    document.addEventListener('DOMContentLoaded', function () {
        // IDが'land_budget_exists'の要素を取得
        const landBudgetExists = document.getElementById('land_budget_exists');
        // IDが'land_budget_input'の要素を取得
        const landBudgetInput = document.getElementById('land_budget_input');
    
        // 「土地の予算」入力の表示・非表示を切り替える関数を定義
        function toggleLandBudgetInput() {
            // 'landBudgetExists'の値が'yes'の場合
            if (landBudgetExists.value === 'yes') {
                // 'landBudgetInput'の値を空に設定
                landBudgetInput.value = ''; 
                // 'landBudgetInput'を無効にする
                landBudgetInput.setAttribute('disabled', true); 
                // 'landBudgetInput'の背景色を薄いグレーに設定
                landBudgetInput.style.backgroundColor = '#e9ecef'; 
                // プレースホルダーを空に設定
                landBudgetInput.placeholder = ''; 
            } else {
                // 'landBudgetExists'の値が'yes'でない場合
                // 'landBudgetInput'の無効属性を削除
                landBudgetInput.removeAttribute('disabled'); 
                // 'landBudgetInput'の背景色を元に戻す
                landBudgetInput.style.backgroundColor = ''; 
                // プレースホルダーを'例）3000万円'に設定
                landBudgetInput.placeholder = '例）3000万円';
            }
        }
    
        // 'landBudgetExists'の変更イベントにtoggleLandBudgetInput関数を登録
        landBudgetExists.addEventListener('change', toggleLandBudgetInput);
        // 初回実行：ページ読み込み時にinputの状態を確認
        toggleLandBudgetInput(); 
    
        // モーダル表示時にフィールドをリセットするイベント
        $('#profileModal').on('show.bs.modal', function () {
            // 'landBudgetInput'の値を空に設定
            landBudgetInput.value = ''; 
            // 'landBudgetInput'を有効にする
            landBudgetInput.removeAttribute('disabled'); 
            // 'landBudgetInput'の背景色を元に戻す
            landBudgetInput.style.backgroundColor = ''; 
            // プレースホルダーを'例）3000万円'に設定
            landBudgetInput.placeholder = '5000万円';
        });
    });
</script>

    

@stop
