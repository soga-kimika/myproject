
    <div class="modal fade" id="client-editModal" tabindex="-1" role="dialog" aria-labelledby="client-editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="client-editModalLabel">プロフィール編集</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('client.update' )}}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label class="bg-summer-sky">住む予定の人数</label>
                            <div class="form-inline">
                                <label for="adult_count" class="mr-2">大人</label>
                                <select name="adult_count" id="adult_count" class="form-control mr-3" required>
                                    <option value="" disabled {{ old('adult_count', $client->adult_count) ? '' : 'selected' }}>選択してください</option>
                                    @foreach(range(1, 5) as $i)
                                        <option value="{{ $i }}" {{ old('adult_count', $client->adult_count) == $i ? 'selected' : '' }}>{{ $i }}人</option>
                                    @endforeach
                                    <option value="5" {{ old('adult_count', $client->adult_count) == 5 ? 'selected' : '' }}>5人以上</option>
                                </select>
                            </div>
                            <div class="form-inline mt-2">
                                <label for="child_count" class="mr-2">子供</label>
                                <select name="child_count" id="child_count" class="form-control mr-3" required>
                                    <option value="" disabled {{ old('child_count', $client->child_count) === null ? 'selected' : '' }}>選択してください</option>
                                    @foreach(range(0, 5) as $i)
                                        <option value="{{ $i }}" {{ old('child_count', $client->child_count) == $i ? 'selected' : '' }}>{{ $i }}人</option>
                                    @endforeach
                                    <option value="5" {{ old('child_count', $client->child_count) == 5 ? 'selected' : '' }}>5人以上</option>
                                </select>
                            </div>
                            <div class="form-inline mt-2">
                                <label for="pet" class="mr-2">ペット</label>
                                <select name="pet" id="pet" class="form-control" required>
                                    <option value="" disabled {{ old('pet', $client->pet) ? '' : 'selected' }}>選択してください</option>
                                    <option value="yes" {{ old('pet', $client->pet) == 'yes' ? 'selected' : '' }}>飼っている</option>
                                    <option value="no" {{ old('pet', $client->pet) == 'no' ? 'selected' : '' }}>飼っていない</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="bg-summer-sky">土地</label>
                            <div class="form-inline">
                                <label for="land_budget_exists">所有地</label>
                                <select name="land_budget_exists" id="land_budget_exists" class="form-control" required>
                                    <option value="" disabled {{ old('land_budget_exists', $client->land_budget_exists) ? '' : 'selected' }}>選択してください</option>
                                    <option value="yes" {{ old('land_budget_exists', $client->land_budget_exists) == 'yes' ? 'selected' : '' }}>所有地あり</option>
                                    <option value="no" {{ old('land_budget_exists', $client->land_budget_exists) == 'no' ? 'selected' : '' }}>所有地なし</option>
                                </select>
                            </div>
                            <div class="form-inline mt-2">
                                <label>予算</label>
                                <input type="text" name="land_budget" class="form-control mr-3" placeholder="5000万円" value="{{ old('land_budget', $client->land_budget) }}">
                            </div>
                            <div class="form-inline mt-2">
                                <label for="land_area">坪数</label>
                                <select name="land_area" class="form-control" required>
                                    <option value="" disabled {{ old('land_area', $client->land_area) ? '' : 'selected' }}>選択してください</option>
                                    @foreach(range(20, 100, 10) as $area)
                                        <option value="{{ $area }}" {{ old('land_area', $client->land_area) == $area ? 'selected' : '' }}>{{ $area }}坪前後</option>
                                    @endforeach
                                    <option value="100" {{ old('land_area', $client->land_area) == 100 ? 'selected' : '' }}>100坪以上</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="bg-summer-sky">建物</label>
                            <div class="form-inline">
                                <label>予算</label>
                                <input type="text" name="building_budget" class="form-control mr-3" placeholder="3000万円" value="{{ old('building_budget', $client->building_budget) }}" required>
                            </div>
                            <div class="form-inline mt-2">
                                <label for="building_area">坪数</label>
                                <select name="building_area" class="form-control" required>
                                    <option value="" disabled {{ old('building_area', $client->building_area) ? '' : 'selected' }}>選択してください</option>
                                    @foreach(range(20, 100, 10) as $area)
                                        <option value="{{ $area }}" {{ old('building_area', $client->building_area) == $area ? 'selected' : '' }}>{{ $area }}坪前後</option>
                                    @endforeach
                                    <option value="100" {{ old('building_area', $client->building_area) == 100 ? 'selected' : '' }}>100坪以上</option>
                                </select>
                            </div>
                            <div class="form-inline mt-2">
                                <label for="floors">階数</label>
                                <select name="floors" class="form-control" required>
                                    <option value="" disabled {{ old('floors', $client->floors) ? '' : 'selected' }}>選択してください</option>
                                    @foreach(range(1, 5) as $floor)
                                        <option value="{{ $floor }}" {{ old('floors', $client->floors) == $floor ? 'selected' : '' }}>{{ $floor }}階建</option>
                                    @endforeach
                                    <option value="5" {{ old('floors', $client->floors) == 5 ? 'selected' : '' }}>5階建以上</option>
                                </select>
                            </div>
                            <div class="form-inline mt-2">
                                <label for="layout">間取り</label>
                                <select name="layout" class="form-control" required>
                                    <option value="" disabled {{ old('layout', $client->layout) ? '' : 'selected' }}>選択してください</option>
                                    @foreach(range(1, 5) as $layout)
                                        <option value="{{ $layout }}" {{ old('layout', $client->layout) == $layout ? 'selected' : '' }}>{{ $layout }}LDK</option>
                                    @endforeach
                                    <option value="5" {{ old('layout', $client->layout) == 5 ? 'selected' : '' }}>5LDK以上</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="bg-summer-sky">駐車場</label>
                            <div class="form-inline mt-2">
                                <label for="regularCars">普通車</label>
                                <select id="regularCars" name="regularCars" class="form-control mr-3" required>
                                    <option value="" disabled {{ old('regularCars', $client->regularCars) === null ? 'selected' : '' }}>選択してください</option>
                                    @foreach(range(0, 3) as $i)
                                        <option value="{{ $i }}" {{ old('regularCars', $client->regularCars) == $i ? 'selected' : '' }}>{{ $i }}台</option>
                                    @endforeach
                                    <option value="3" {{ old('regularCars', $client->regularCars) == 3 ? 'selected' : '' }}>4台以上</option>
                                </select>
                            </div>
                            <div class="form-inline mt-2">
                                <label for="miniCars">軽自動車</label>
                                <select id="miniCars" name="miniCars" class="form-control" required>
                                    <option value="" disabled {{ old('miniCars', $client->miniCars) === null ? 'selected' : '' }}>選択してください</option>
                                    @foreach(range(0, 3) as $i)
                                        <option value="{{ $i }}" {{ old('miniCars', $client->miniCars) == $i ? 'selected' : '' }}>{{ $i }}台</option>
                                    @endforeach
                                    <option value="3" {{ old('miniCars', $client->miniCars) == 3 ? 'selected' : '' }}>4台以上</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="bg-summer-sky">建築希望日</label>
                            <input type="date" name="date" class="form-control" value="{{ old('date', $client->date) }}" required>
                        </div>

                        <div class="form-group">
                            <label class="bg-summer-sky">今の家で不満に思っていること</label>
                            <textarea name="current_home_issues" class="form-control" placeholder="不満なことを記入" rows="4" >{{ old('current_home_issues',$client->current_home_issues) }}</textarea>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">キャンセル</button>
                            <button type="submit" class="btn btn-primary">更新</button>
                        </div>
                    </form>
                </div>
            </div>
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

