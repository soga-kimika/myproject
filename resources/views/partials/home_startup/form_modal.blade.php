{{-- ホームスタートアップモーダル --}}
<div class="modal fade" id="homeStartupModal" tabindex="-1" aria-labelledby="homeStartupModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="homeStartupModalLabel">スタートアップアイテムの追加</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('homeStartupItems.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    {{-- 入力フォーム --}}
                    <div class="border-bottom pb-2 mb-3 mt-4">
                        <div class="col-md-12 d-flex mb-3">
                            <label class="mb-0">優先度：</label>
                            <div class="d-flex">
                                <div class="form-check me-3">
                                    <input type="radio" class="form-check-input" name="priority" value="high" id="priority-high" {{ old('priority', 'high') == 'high' ? 'checked' : '' }}>
                                    <label class="form-check-label radio" for="priority-high">高 <i class="fa fa-star"></i></label>
                                </div>
                                <div class="form-check me-3">
                                    <input type="radio" class="form-check-input" name="priority" value="medium" id="priority-medium" {{ old('priority') == 'medium' ? 'checked' : '' }}>
                                    <label class="form-check-label radio" for="priority-medium">中 <i class="fa fa-star-half-alt"></i></label>
                                </div>
                                <div class="form-check me-3">
                                    <input type="radio" class="form-check-input" name="priority" value="low" id="priority-low" {{ old('priority') == 'low' ? 'checked' : '' }}>
                                    <label class="form-check-label radio" for="priority-low">低 <i class="far fa-star"></i></label>
                                </div>
                            </div>
                            <div class="me-3"></div>
                            <label class="me-2 mb-0">カテゴリー：</label>
                            <div class="d-flex align-items-center">
                                <div class="form-check me-3">
                                    <input type="radio" class="form-check-input" name="category" value="furniture" id="furniture" {{ old('category', 'furniture') == 'furniture' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="furniture">ファニチャー</label>
                                </div>
                                <div class="form-check me-3">
                                    <input type="radio" class="form-check-input" name="category" value="appliance" id="appliance" {{ old('category') == 'appliance' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="appliance">アプライアンス</label>
                                </div>
                                <div class="form-check me-3">
                                    <input type="radio" class="form-check-input" name="category" value="accessories" id="accessories" {{ old('category') == 'accessories' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="accessories">アクセサリーズ</label>
                                </div>
                            </div>
                            {{-- ファイル名表示 --}}
                            <div class="d-flex align-items-center">
                                <input type="file" name="imageUpload" id="imageUpload" accept="image/*" class="d-none" onchange="displayFileName('imageUpload', 'fileName')">
                                <span id="fileName" class="ms-2 file-name"></span>
                            </div>
                        </div>

                        {{-- 要望欄 --}}
                        <div class="form-group d-flex align-items-center col-md-12 mb-3">
                            <input type="text" name="item_name" id="item_name" class="item-form-control form-control-lg me-2" placeholder="欲しいものを記入してください" value="{{ old('item_name') }}" required style="height: 50px;">
                            
                            {{-- 金額、個数、合計 --}}
                            <div class="d-flex">
                                <input type="number" name="price" class="form-control me-2" placeholder="金額" step="1000" min="1000" style="width: 120px; height: 50px;" value="{{ old('price') }}" oninput="calculateTotal()">
                                <input type="number" name="quantity" class="form-control me-2" placeholder="個数" min="1" style="width: 80px; height: 50px;" value="{{ old('quantity') }}" oninput="calculateTotal()">
                                <input type="number" name="amount" id="amount" class="form-control" placeholder="合計" step="1000" min="0" style="width: 120px; height: 50px;" readonly>
                            </div>

                            {{-- 画像選択ボタン --}}
                            <label for="imageUpload" class="btn me-2 form-check-label btn-select">
                                画像を選択 <i class="fas fa-upload"></i>
                            </label>

                            {{-- 登録ボタン --}}
                            <button type="submit" class="btn btn-store ms-2">登録</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
