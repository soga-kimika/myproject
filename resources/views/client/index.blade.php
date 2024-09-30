@extends('adminlte::page')

@section('title', 'マイホームNOTE')

@section('content_header')


        
<h1><i class="far fa-address-card"></i>プロフィール</h1>
@stop

@section('content')
    <div class="container-fluid">
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

        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <a href="#" class="btn btn-edit" data-toggle="modal" data-target="#client-editModal">
                        プロフィール編集
                    </a>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h5 class="bg-summer-sky p-2">住む予定の人数</h5>
                                    <div class="row">
                                        <div class="col-6">
                                            <p><i class="fas fa-user"></i> 大人： <strong>{{ $client->adult_count }}人</strong></p>
                                        </div>
                                        <div class="col-6">
                                            <p><i class="fas fa-child"></i> 子供： <strong>{{ $client->child_count }}人</strong></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                    <p><i class="fas fa-paw"></i> ペット： <strong>{{ $client->pet == 'yes' ? '飼っている' : '飼っていない' }}</strong></p>
                                </div>
                            </div>
                        </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h5 class="bg-summer-sky p-2">土地</h5>
                                    <div class="row">
                                        <div class="col-6">
                                            <p><i class="fas fa-money-bill-wave"></i> 所有地： <strong>{{ $client->land_budget_exists == 'yes' ? '所有地あり' : '所有地なし' }}</strong></p>
                                        </div>
                                        <div class="col-6">
                                            <p><i class="fas fa-money-bill-wave"></i> 土地予算： <strong>{{ $client->land_budget }}</strong></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <p><i class="fas fa-home"></i> 土地の坪数： <strong>{{ $client->land_area }}坪</strong></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h5 class="bg-summer-sky p-2">建物</h5>
                                    <div class="row">
                                        <div class="col-6">
                                            <p><i class="fas fa-building"></i> 建物予算： <strong>{{ $client->building_budget }}</strong></p>
                                        </div>
                                        <div class="col-6">
                                            <p><i class="fas fa-home-lg"></i> 建物の坪数： <strong>{{ $client->building_area }}坪</strong></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <p><i class="fas fa-layer-group"></i> 階数： <strong>{{ $client->floors }}階建</strong></p>
                                        </div>
                                        <div class="col-6">
                                            <p><i class="fas fa-th"></i> 間取り： <strong>{{ $client->layout }}LDK</strong></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h5 class="bg-summer-sky p-2">駐車場</h5>
                                    <div class="row">
                                        <div class="col-6">
                                            <p><i class="fas fa-car"></i> 普通車： <strong>{{ $client->regularCars }}台</strong></p>
                                        </div>
                                        <div class="col-6">
                                            <p><i class="fas fa-car-side"></i> 軽自動車： <strong>{{ $client->miniCars }}台</strong></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <p><i class="fas fa-motorcycle"></i> バイク： <strong>{{ $client->motorcycles }}台</strong></p>
                                        </div>
                                        <div class="col-6">
                                            <p><i class="fas fa-bicycle"></i> 自転車： <strong>{{ $client->bicycles }}台</strong></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h5 class="bg-summer-sky p-2">建築希望地</h5>
                                    <p><strong>{{ $client->construction_area }}</strong></p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h5 class="bg-summer-sky p-2">建築希望日</h5>
                                    <p><strong>{{ $client->date }}</strong></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h5 class="bg-summer-sky p-2">今の家で不満に思っていること</h5>
                                    <p><strong>{{ $client->current_home_issues }}</strong></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@stop

@section('css')
<style>
.bg-summer-sky{
    text-align: center;
    font-weight: bold;
    color: rgb(71, 70, 70);
}

.col-md-6{
    text-align: center;
}

.content-header h1{
    text-align: center;
    color:  rgb(71, 70, 70);
    font-weight: bold;
    line-height: 110px; 
    font-size: 2.5rem; 

}

.btn-edit-client{
    text-align: right;
}

.fa-address-card{
    color: #dc3545;
}


</style>
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

