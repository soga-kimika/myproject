{{-- ホームスタートアップ入力フォーム --}}
<div class="container">
    <div class="col-md-12 mx-auto"> 
        <form action="{{ route('homeStartupItems.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{-- 入力フォーム --}}
            <div class="border-bottom pb-2 mb-3 mt-4">
                <div class="col-md-12 d-flex mb-3">
                    <label class="mb-0">優先度：</label>
                    <div class="d-flex">
                        <div class="form-check me-3">
                            <input type="radio" class="form-check-input" name="priority" value="high" id="priority-high" checked>
                            <label class="form-check-label radio" for="priority-high">高 <i class="fa fa-star"></i></label>
                        </div>
                        <div class="form-check me-3">
                            <input type="radio" class="form-check-input" name="priority" value="medium" id="priority-medium">
                            <label class="form-check-label radio" for="priority-medium">中 <i class="fa fa-star-half-alt"></i></label>
                        </div>
                        <div class="form-check me-3">
                            <input type="radio" class="form-check-input" name="priority" value="low" id="priority-low">
                            <label class="form-check-label radio" for="priority-low">低 <i class="far fa-star"></i></label>
                        </div>
                    </div>
                    <div class="me-3"></div>
                    <label class="me-2 mb-0">カテゴリー：</label>
                    <div class="d-flex align-items-center">
                        <div class="form-check me-3">
                            <input type="radio" class="form-check-input" name="category" value="furniture" id="furniture" checked>
                            <label class="form-check-label" for="furniture">ファニチャー</label>
                        </div>
                        <div class="form-check me-3">
                            <input type="radio" class="form-check-input" name="category" value="appliance" id="appliance">
                            <label class="form-check-label" for="appliance">アプライアンス</label>
                        </div>
                        <div class="form-check me-3">
                            <input type="radio" class="form-check-input" name="category" value="accessories" id="accessories">
                            <label class="form-check-label" for="accessories">アクセサリーズ</label>
                        </div>
                    </div>
                    {{-- ファイル名表示 --}}
                    <div class="d-flex align-items-center">
                        <div class="d-flex align-items-center">
                            <input type="file" name="imageUpload" id="imageUpload" accept="image/*" class="d-none" onchange="displayFileName('imageUpload', 'fileName')">
                            <span id="fileName" class="ms-2 file-name"></span>
                        </div>
                    </div>
                </div>

                {{-- 品名記入欄--}}
                <div class="form-group d-flex align-items-center col-md-12 mb-3">
                    <input type="text" name="item_name" id="item_name" class="item-form-control form-control-lg me-2" placeholder="品名" required >
                    {{-- メーカー・型番記入欄 --}}
                    <input type="text" name="manufacturer" id="manufacturer" class="item-form-control form-control-lg me-2" placeholder="メーカー・型番" >
                    {{-- 金額、個数、合計 --}}
                    <div class="d-flex">
                        <input type="number" name="quantity" class="form-control quantity-form-control me-2" placeholder="個数" min="1" style="width: 70px;"  required oninput="calculateTotal()" value="1">
                        <input type="number" name="price" class="form-control  price-form-control me-2" placeholder="金額" step="1000" min="1000" style="width: 90px;" oninput="calculateTotal()">
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


