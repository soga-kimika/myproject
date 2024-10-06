<div class="modal fade" id="client-editModal" tabindex="-1" role="dialog" aria-labelledby="client-editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="client-editModalLabel">プロフィール編集</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('clients.update')}}">
                    @csrf
                    @method('PUT')

                    <div class="container">
                        <section class="content client-content">
                            <div class="row">
                                <div class="col-md-12">
                            <div class="card mb-3">
                                <div class="card-header">
                                    <h5 class="form-title">住む予定の人数</h5>
                                </div>
                                <div class="client-card-body">
                                    <div class="form-group">
                                        <div class="client-form-inline ">
                                            <label for="adult_count" class="mr-2">大人</label>
                                            <select name="adult_count" id="adult_count" class="form-control mr-3" required>
                                                <option value="" disabled {{ old('adult_count', $client->adult_count) == null ? 'selected' : '' }}>選択してください</option>
                                                @foreach(range(1, 5) as $i)
                                                    <option value="{{ $i }}" {{ old('adult_count', $client->adult_count) == $i ? 'selected' : '' }}>{{ $i }}人</option>
                                                @endforeach
                                                <option value="6" {{ old('adult_count', $client->adult_count) == 6 ? 'selected' : '' }}>6人以上</option>
                                            </select>
                                        </div>
                                        <div class="client-form-inline mt-2">
                                            <label for="child_count" class="mr-2">子供</label>
                                            <select name="child_count" id="child_count" class="form-control mr-3" required>
                                                <option value="" disabled {{ old('child_count', $client->child_count) === null ? 'selected' : '' }}>選択してください</option>
                                                @foreach(range(0, 5) as $i)
                                                    <option value="{{ $i }}" {{ old('child_count', $client->child_count) === (string)$i ? 'selected' : '' }}>{{ $i }}人</option>
                                                @endforeach
                                                <option value="6" {{ old('child_count', $client->child_count) == 6 ? 'selected' : '' }}>6人以上</option>
                                            </select>
                                        </div>
                                        <div class="client-form-inline mt-2">
                                            <label for="pet" class="mr-2">ペット</label>
                                            <select name="pet" id="pet" class="form-control mr-3" required>
                                                <option value="" disabled {{ old('pet', $client->pet) == null ? 'selected' : '' }}>選択してください</option>
                                                <option value="yes" {{ old('pet', $client->pet) == 'yes' ? 'selected' : '' }}>飼っている</option>
                                                <option value="no" {{ old('pet', $client->pet) == 'no' ? 'selected' : '' }}>飼っていない</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card mb-3">
                                <div class="card-header">
                                    <h5 class="form-title">土地</h5>
                                </div>
                                <div class="client-card-body">
                                    <div class="form-group">
                                        <div class="client-form-inline justify-content-center">
                                            <label for="land_budget_exists">所有地</label>
                                            <select name="land_budget_exists" id="land_budget_exists" class="form-control mr-3" required>
                                                <option value="" disabled {{ old('land_budget_exists', $client->land_budget_exists) == null ? 'selected' : '' }}>選択してください</option>
                                                <option value="yes" {{ old('land_budget_exists', $client->land_budget_exists) == 'yes' ? 'selected' : '' }}>所有地あり</option>
                                                <option value="no" {{ old('land_budget_exists', $client->land_budget_exists) == 'no' ? 'selected' : '' }}>所有地なし</option>
                                            </select>
                                        </div>
                                        <div class="client-form-inline justify-content-center mt-2">
                                            <label>予算</label>
                                            <input type="text" name="land_budget" class="form-control mr-3" placeholder="◯◯◯◯万円と入力してください" value="{{ old('land_budget', $client->land_budget) }}" id="land_budget_input">
                                        </div>
                                        <div class="client-form-inline justify-content-center mt-2">
                                            <label for="land_area">坪数</label>
                                            <select name="land_area" class="form-control mr-3" required>
                                                <option value="" disabled {{ old('land_area', $client->land_area) === null ? 'selected' : '' }}>選択してください</option>
                                                @foreach(range(20, 90, 10) as $area)
                                                    <option value="{{ $area }}" {{ old('land_area', $client->land_area) == $area ? 'selected' : '' }}>{{ $area }}坪前後</option>
                                                @endforeach
                                                <option value="100" {{ old('land_area', $client->land_area) == 100 ? 'selected' : '' }}>100坪以上</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card mb-3">
                                <div class="card-header">
                                    <h5 class="form-title">建物</h5>
                                </div>
                                <div class="client-card-body">
                                    <div class="form-group">
                                        <div class="client-form-inline justify-content-center">
                                            <label>予算</label>
                                            <input type="text" name="building_budget" class="form-control mr-3" placeholder="◯◯◯◯万円と入力してください" value="{{ old('building_budget', $client->building_budget) }}" required>
                                        </div>
                                        <div class="client-form-inline justify-content-center mt-2">
                                            <label for="building_area">坪数</label>
                                            <select name="building_area" class="form-control mr-3" required>
                                                <option value="" disabled {{ old('building_area', $client->building_area) === null ? 'selected' : '' }}>選択してください</option>
                                                @foreach(range(20, 90, 10) as $area)
                                                    <option value="{{ $area }}" {{ old('building_area', $client->building_area) == $area ? 'selected' : '' }}>{{ $area }}坪前後</option>
                                                @endforeach
                                                <option value="100" {{ old('building_area', $client->building_area) == 100 ? 'selected' : '' }}>100坪以上</option>
                                            </select>
                                        </div>
                                        <div class="client-form-inline justify-content-center mt-2">
                                            <label for="floors">階数</label>
                                            <select name="floors" class="form-control mr-3" required>
                                                <option value="" disabled {{ old('floors', $client->floors) === null ? 'selected' : '' }}>選択してください</option>
                                                @foreach(range(1, 5) as $floor)
                                                    <option value="{{ $floor }}" {{ old('floors', $client->floors) == $floor ? 'selected' : '' }}>{{ $floor }}階建</option>
                                                @endforeach
                                                <option value="6" {{ old('floors', $client->floors) == 6 ? 'selected' : '' }}>6階建以上</option>
                                            </select>
                                        </div>
                                        <div class="client-form-inline justify-content-center mt-2">
                                            <label for="layout">間取り</label>
                                            <select name="layout" class="form-control mr-3" required>
                                                <option value="" disabled {{ old('layout', $client->layout) === null ? 'selected' : '' }}>選択してください</option>
                                                @foreach(range(1, 5) as $layout)
                                                    <option value="{{ $layout }}" {{ old('layout', $client->layout) == $layout ? 'selected' : '' }}>{{ $layout }}LDK</option>
                                                @endforeach
                                                <option value="6" {{ old('layout', $client->layout) == 6 ? 'selected' : '' }}>6LDK以上</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card mb-3">
                                <div class="card-header">
                                    <h5 class="form-title">駐車場</h5>
                                </div>
                                <div class="client-card-body">
                                    <div class="form-group">
                                        <div class="client-form-inline justify-content-center mt-2">
                                            <label for="regularCars">普通車</label>
                                            <select id="regularCars" name="regularCars" class="form-control mr-3" required>
                                                <option value="" disabled {{ old('regularCars', $client->regularCars) === null ? 'selected' : '' }}>選択してください</option>
                                                @foreach(range(0, 3) as $i)
                                                    <option value="{{ $i }}" {{ old('regularCars', $client->regularCars) === (string)$i ? 'selected' : '' }}>{{ $i }}台</option>
                                                @endforeach
                                                <option value="4" {{ old('regularCars', $client->regularCars) == 4 ? 'selected' : '' }}>4台以上</option>
                                            </select>
                                        </div>
                                        <div class="client-form-inline justify-content-center mt-2">
                                            <label for="compactCars">軽自動車</label>
                                            <select id="compactCars" name="compactCars" class="form-control mr-3" required>
                                                <option value="" disabled {{ old('compactCars', $client->compactCars) === null ? 'selected' : '' }}>選択してください</option>
                                                @foreach(range(0, 3) as $i)
                                                    <option value="{{ $i }}" {{ old('compactCars', $client->compactCars) === (string)$i ? 'selected' : '' }}>{{ $i }}台</option>
                                                @endforeach
                                                <option value="4" {{ old('compactCars', $client->compactCars) == 4 ? 'selected' : '' }}>4台以上</option>
                                            </select>
                                        </div>
                                        <div class="client-form-inline justify-content-center mt-2">
                                            <label for="motorcycles">バイク</label>
                                            <select id="motorcycles" name="motorcycles" class="form-control mr-3" required>
                                                <option value="" disabled {{ old('motorcycles', $client->motorcycles) === null ? 'selected' : '' }}>選択してください</option>
                                                @foreach(range(0, 3) as $i)
                                                    <option value="{{ $i }}" {{ old('motorcycles', $client->motorcycles) === (string)$i ? 'selected' : '' }}>{{ $i }}台</option>
                                                @endforeach
                                                <option value="4" {{ old('motorcycles', $client->motorcycles) == 4 ? 'selected' : '' }}>4台以上</option>
                                            </select>
                                        </div>
                                        <div class="client-form-inline justify-content-center mt-2">
                                            <label for="bicycles">自転車</label>
                                            <select id="bicycles" name="bicycles" class="form-control mr-3" required>
                                                <option value="" disabled {{ old('bicycles', $client->bicycles) === null ? 'selected' : '' }}>選択してください</option>
                                                @foreach(range(0, 3) as $i)
                                                    <option value="{{ $i }}" {{ old('bicycles', $client->bicycles) === (string)$i ? 'selected' : '' }}>{{ $i }}台</option>
                                                @endforeach
                                                <option value="4" {{ old('bicycles', $client->bicycles) == 4 ? 'selected' : '' }}>4台以上</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card mb-3">
                                <div class="card-header">
                                    <h5 class="form-title">建築希望地</h5>
                                </div>
                                <div class="client-card-body text-center">
                                    <div class="form-group">
                                        <input type="text" name="construction_area" class="form-control" placeholder="家を建てる希望の場所・エリアを入力" value="{{ old('construction_area', $client->construction_area) }}" required>
                                    </div>
                                </div>
                            </div>

                            <div class="card mb-3">
                                <div class="card-header">
                                    <h5 class="form-title">完成希望日</h5>
                                </div>
                                <div class="client-card-body">
                                    <div class="form-group">
                                        <input type="date" name="date" class="form-control" value="{{ old('date', $client->date) }}" required>
                                    </div>
                                </div>
                            </div>

                            <div class="card mb-3">
                                <div class="card-header">
                                    <h5 class="form-title">今の家で不満に思っていること</h5>
                                </div>
                                <div class="client-card-body text-center">
                                    <div class="form-group">
                                        <textarea name="current_home_issues" class="form-control" rows="6" placeholder="不満に思っていることを入力" required>{{ old('current_home_issues', $client->current_home_issues) }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">保存</button>
                            </div>
                        </section>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

