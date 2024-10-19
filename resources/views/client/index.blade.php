@extends('adminlte::page')

@section('title', 'プロフィール')

@section('content_header')
<div class="btn-edit-client">
    {{-- 編集モーダルトリガー --}}
<a href="#" class="btn btn-edit btn-edit-client" data-toggle="modal" data-target="#client-editModal">
    プロフィール編集 <i class="fas fa-edit"></i>
</a>
</div>
        
<h1 class="content-header-client"   >
    <i class="far fa-address-card"></i>プロフィール</h1>
@include('client.edit')

@stop

@section('content')
{{-- エラー読み込み --}}
@include('partials.errors') 
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="row mb-2 client-mb-2">
                        <div class="col-md-6">
                            <div class="card mb-2">
                                {{-- 編集モーダル中身 --}}
                                <div class="card-body">
                                    <h5 class="form-title index-form-title p-2">住む予定の人数</h5>
                                    <div class="row">
                                        <div class="col-6">
                                            <p><i class="fas fa-user"></i> 大人： <strong>{{ $client->adult_count }}人</strong></p>
                                        </div>
                                        <div class="col-6">
                                            <p><i class="fas fa-child client-icon"></i> 子供： <strong>{{ $client->child_count }}人</strong></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                    <p><i class="fas fa-paw"></i> ペット： <strong>{{ $client->pet == 'yes' ? 'いる' : 'いない' }}</strong></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                        <div class="col-md-6">
                            <div class="card mb-2">
                                <div class="card-body">
                                    <h5 class="form-title index-form-title p-2">土地</h5>
                                    <div class="row">
                                        <div class="col-6">
                                            <p><i class="fas fa-map"></i> 所有地： <strong>{{ $client->land_budget_exists == 'yes' ? 'あり' : 'なし' }}</strong></p>
                                        </div>
                                        <div class="col-6">
                                            <p><i class="fas fa-yen-sign"></i> 予算： <strong>{{ $client->land_budget }}</strong></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <p><i class="fas fa-home"></i> 坪数： <strong>{{ $client->land_area }}坪前後</strong></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-md-6">
                            <div class="card mb-2">
                                <div class="card-body">
                                    <h5 class="form-title index-form-title p-2">建物</h5>
                                    <div class="row">
                                        <div class="col-6">
                                            <p><i class="fas fa-yen-sign"></i> 予算： <strong>{{ $client->building_budget }}</strong></p>
                                        </div>
                                        <div class="col-6">
                                            <p><i class="fas fa-home"></i> 坪数： <strong>{{ $client->building_area }}坪前後</strong></p>
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
                            <div class="card mb-2">
                                <div class="card-body">
                                    <h5 class="form-title index-form-title p-2">駐車場</h5>
                                    <div class="row">
                                        <div class="col-6">
                                            <p><i class="fas fa-car"></i> 普通車： <strong>{{ $client->regularCars }}台</strong></p>
                                        </div>
                                        <div class="col-6">
                                            <p><i class="fas fa-car-side"></i> 軽自動車： <strong>{{ $client->compactCars }}台</strong></p>
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

                    <div class="row mb-2">
                        <div class="col-md-6">
                            <div class="card mb-2">
                                <div class="card-body">
                                    <h5 class="form-title index-form-title p-2">建築希望地</h5>
                                    <p><strong>{{ $client->construction_area }}</strong></p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card mb-2">
                                <div class="card-body">
                                    <h5 class="form-title index-form-title p-2">完成希望日</h5>
                                    <p><strong>{{ $client->date }}</strong></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-md-12">
                            <div class="card mb-2">
                                <div class="card-body">
                                    <h5 class="form-title index-form-title p-2">今の家の不満点</h5>
                                    <p><strong>{{ $client->current_home_issues }}</strong></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
            landBudgetInput.placeholder = '例）3000万円';
        });
    });
</script>



@stop

