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

    <div class="container-fluid container-fluid-client">
        <div class="container">
            <section class="content-header">
                <h1>プロフィール</h1>
            </section>

            <section class="content">
                <form method="post" action="{{ route('client.store') }}">
                    @csrf 

                    <div class="form-group">
                        <label class="bg-summer-sky">住む予定の人数</label>
                        <div class="form-inline">
                            <label for="adult_count" class="mr-2">大人　</label>
                            <select name="adult_count" id="adult_count" class="form-control mr-3" required>
                                <option value="" disabled selected>選択してください</option>
                                @foreach(range(1, 5) as $i)
                                    <option value="{{ $i }}" {{ old('adult_count') == $i ? 'selected' : '' }}>{{ $i }}人</option>
                                @endforeach
                                <option value="5">5人以上</option>
                            </select>
                        </div>
                      <div class="form-inline mt-2">
                            <label for="child_count" class="mr-2">子供　</label>
                            <select name="child_count" id="child_count" class="form-control mr-3" required>
                                <option value="" disabled selected>選択してください</option>
                                @foreach(range(0, 5) as $i)
                                    <option value="{{ $i }}" {{ old('child_count') === (string)$i ? 'selected' : '' }}>{{ $i }}人</option>
                                @endforeach
                                <option value="5">5人以上</option>
                            </select>
                        </div>  
                        <div class="form-inline mt-2">
                            <label for="pet" class="mr-2">ペット</label>
                            <select name="pet" id="pet" class="form-control" required>
                                <option value="" disabled selected>選択してください</option>
                                <option value="yes" {{ old('pet') == 'yes' ? 'selected' : '' }}>飼っている</option>
                                <option value="no" {{ old('pet') == 'no' ? 'selected' : '' }}>飼っていない</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="bg-summer-sky">土地</label>
                        <div class="form-inline">
                            <label for="land_budget_exists">所有地　</label>
                            <select name="land_budget_exists" id="land_budget_exists" class="form-control" required>
                                <option value="" disabled selected>選択してください</option>
                                <option value="yes" {{ old('land_budget_exists') == 'yes' ? 'selected' : '' }}>所有地あり</option>
                                <option value="no" {{ old('land_budget_exists') == 'no' ? 'selected' : '' }}>所有地なし</option>
                            </select>
                            <div class="form-inline mt-2">
                                </select>
                            </div>
                        </div>
                    </div>                                 
                    <div class="form-inline mt-2">
                        <label>予算　　</label>
                        <input type="text" name="land_budget" class="form-control mr-3" placeholder="5000万円" id="land_budget_input">
                    </div>
                        <div class="form-inline mt-2">
                            <label for="land_area">坪数　　</label>
                            <select name="land_area" class="form-control" required>
                                <option value="" disabled selected>選択してください</option>
                                @foreach(range(20, 100, 10) as $area)
                                    <option value="{{ $area }}" {{ old('land_area') == $area ? 'selected' : '' }}>{{ $area }}坪前後</option>
                                @endforeach
                                <option value="100">100坪以上</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="bg-summer-sky">建物</label>
                        <div class="form-inline">
                            <label>予算　　</label>
                            <input type="text" name="building_budget" class="form-control mr-3" placeholder="3000万円" required>
                        </div>
                        <div class="form-inline mt-2">
                            <label for="building_area">坪数　　</label>
                            <select name="building_area" class="form-control mr-3" required>
                                <option value="" disabled selected>選択してください</option>
                                @foreach(range(20, 100, 10) as $area)
                                    <option value="{{ $area }}" {{ old('building_area') == $area ? 'selected' : '' }}>{{ $area }}坪前後</option>
                                @endforeach
                                <option value="100">100坪以上</option>
                            </select>
                        </div>
                        <div class="form-inline mt-2">
                            <label for="floors">階数　　</label>
                            <select name="floors" class="form-control" required>
                                <option value="" disabled selected>選択してください</option>
                                @foreach(range(1, 5) as $floor)
                                    <option value="{{ $floor }}" {{ old('floors') == $floor ? 'selected' : '' }}>{{ $floor }}階建</option>
                                @endforeach
                                <option value="5">5階建以上</option>
                            </select>
                        </div>
                        <div class="form-inline mt-2">
                            <label for="layout">間取り　</label>
                            <select name="layout" class="form-control" required>
                                <option value="" disabled selected>選択してください</option>
                                @foreach(range(1, 5) as $layout)
                                    <option value="{{ $layout }}" {{ old('layout') == $layout ? 'selected' : '' }}>{{ $layout }}LDK</option>
                                @endforeach
                                <option value="5">5LDK以上</option>
                            </select>
                        </div>
                    </div>
                    <label class="bg-summer-sky">駐車場</label>
                    <div class="form-inline mt-2">
                        <label for="regularCars">普通車　</label>
                        <select id="regularCars" name="regularCars" class="form-control mr-3" required>
                            <option value="" disabled selected>選択してください</option>
                            @foreach(range(0, 3) as $i)
                                <option value="{{ $i }}" {{ old('regularCars') === (string)$i ? 'selected' : '' }}>{{ $i }}台</option>
                            @endforeach
                            <option value="3">3台以上</option>
                        </select>
                    </div>
                    <div class="form-inline mt-2">
                        <label for="compactCars">軽自動車</label>
                        <select id="compactCars" name="compactCars" class="form-control mr-3" required>
                            <option value="" disabled selected>選択してください</option>
                            @foreach(range(0, 3) as $i)
                                <option value="{{ $i }}" {{ old('compactCars') === (string)$i ? 'selected' : '' }}>{{ $i }}台</option>
                            @endforeach
                            <option value="3">3台以上</option>
                        </select>
                    </div>
                    <div class="form-inline mt-2">
                        <label for="motorcycles">バイク　</label>
                        <select id="motorcycles" name="motorcycles" class="form-control mr-3" required>
                            <option value="" disabled selected>選択してください</option>
                            @foreach(range(0, 3) as $i)
                                <option value="{{ $i }}" {{ old('motorcycles') === (string)$i ? 'selected' : '' }}>{{ $i }}台</option>
                            @endforeach
                            <option value="3">3台以上</option>
                        </select>
                    </div>  
                    <div class="form-inline mt-2">   
                        <label for="bicycles">自転車　</label>
                        <select id="bicycles" name="bicycles" class="form-control" required>
                            <option value="" disabled selected>選択してください</option>
                            @foreach(range(0, 3) as $i)
                                <option value="{{ $i }}" {{ old('bicycles') == (string)$i ? 'selected' : '' }}>{{ $i }}台</option>
                            @endforeach
                            <option value="3">3台以上</option>
                        </select>
                    </div>
                    

                </div>
                    <div class="form-group col-md-7">
                        <label class="bg-summer-sky">建築希望地</label>
                        <input type="text" name="construction_area" class="form-control" placeholder="例: 城北、北久米" value="{{ old('construction_area') }}" required>
                    </div>

                    <div class="form-group col-md-6">
                        <label class="bg-summer-sky">建築希望日</label>
                        <input type="date" id="date" name="date" class="form-control" value="{{ old('date') }}" required>
                    </div>

                    <div class="form-group">
                        <label class="bg-summer-sky">今の家で不満に思っていること</label>
                        <textarea name="current_home_issues" class="form-control" placeholder="不満なことを記入" rows="4" >{{ old('current_home_issues') }}</textarea>
                    </div>

                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-store ms-2">登録</button>
                    </div>
                </form>
            </section>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('/css/item/index.css') }}">
@stop

@section('js')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const landBudgetExists = document.getElementById('land_budget_exists');
        const landBudgetInput = document.getElementById('land_budget_input');
        const landBudgetPlaceholder = document.getElementById('land_budget_placeholder');

        function toggleLandBudgetInput() {
            if (landBudgetExists.value === 'yes') {
                landBudgetInput.value = ''; // 予算をクリア
                landBudgetInput.setAttribute('disabled', true); // 無効化
                landBudgetInput.style.backgroundColor = '#e9ecef'; // 色を変える 
                 landBudgetInput.placeholder = ''; // プレースホルダーを消す
            } else {
                landBudgetInput.removeAttribute('disabled'); // 有効化
                landBudgetInput.style.backgroundColor = ''; // 元の色に戻す
                landBudgetInput.placeholder = '5000万円'; // プレースホルダーを元に戻す
            }
        }

        landBudgetExists.addEventListener('change', toggleLandBudgetInput);
        toggleLandBudgetInput(); // 初期状態を設定
    });
</script>


@stop
