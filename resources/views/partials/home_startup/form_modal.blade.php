{{-- ホームスタートアップ編集モーダル中身--}}
<div class="container">
    <div class="col-md-12 mx-auto"> 
                    <div class="border-bottom pb-2 mb-3 mt-4">
                        <div class="col-md-12 d-flex mb-3">
                            <label class="mb-0">優先度：</label>
                            <div class="d-flex">
                                <div class="form-check me-3">
                                    <input type="radio" class="form-check-input" name="priority" value="high" id="priority-high{{ $homeStartupItem->id }}" {{ old('priority', $homeStartupItem->priority) == 'high' ? 'checked' : '' }}>
                                    <label class="form-check-label radio" for="priority-high{{ $homeStartupItem->id }}">高 <i class="fa fa-star"></i></label>
                                </div>
                                <div class="form-check me-3">
                                    <input type="radio" class="form-check-input" name="priority" value="medium" id="priority-medium{{ $homeStartupItem->id }}" {{ old('priority',$homeStartupItem->priority) == 'medium' ? 'checked' : '' }}>
                                    <label class="form-check-label radio" for="priority-medium{{ $homeStartupItem->id }}">中 <i class="fa fa-star-half-alt"></i></label>
                                </div>
                                <div class="form-check me-3">
                                    <input type="radio" class="form-check-input" name="priority" value="low" id="priority-low{{ $homeStartupItem->id }}" {{ old('priority',$homeStartupItem->priority) == 'low' ? 'checked' : '' }}>
                                    <label class="form-check-label radio" for="priority-low{{ $homeStartupItem->id }}">低 <i class="far fa-star"></i></label>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                            {{-- ファイル選択ボタン --}}
                            <label for="imageUpload{{ $homeStartupItem->id }}" class="btn me-2 form-check-label btn-select">
                                画像を選択 <i class="fas fa-upload"></i>
                            </label>
                         {{-- ファイル名表示 --}}
                                <input type="file" name="imageUpload" id="imageUpload{{ $homeStartupItem->id }}" accept="image/*" class="d-none" onchange="displayFileName('imageUpload{{ $homeStartupItem->id }}', 'fileName{{ $homeStartupItem->id }}')"value="{{ old('image_url',$homeStartupItem->image_url) }}">
                                <span id="fileName{{ $homeStartupItem->id }}" class="ms-2 file-name ">
                            {{ old('imageUpload', $homeStartupItem->image_name ? basename($homeStartupItem->image_name) : '画像はありません') }}</span>
                            </div>
                        </div>

                        {{-- 品名欄 --}}
                        <div class="form-group d-flex align-items-center col-md-12 mb-3">
                            <input type="text" name="item_name" id="item_name" class="item-form-control form-control-lg me-2 homeStartupItem-col-request" placeholder="品名" value="{{ old('item_name',$homeStartupItem->item_name) }}"  >
                         {{-- メーカー・型番記入欄 --}}
                         <input type="text" name="manufacturer" id="manufacturer" class="item-form-control form-control-lg me-2 homeStartupItem-col-request" placeholder="メーカー・型番"value="{{ old('manufacturer',$homeStartupItem->manufacturer) }}" > 
                            {{-- 金額、個数、合計 --}}
                            <div class="d-flex ">
                                <input type="number" name="price" class="form-control price-form-control me-2 homeStartupItem-col-price" placeholder="金額" step="1000" min="1000" value="{{ old('price',$homeStartupItem->price) }}" oninput="calculateTotal()" step="1">
                                <input type="number" name="quantity" class="form-control quantity-form-control me-2 quantity-form-control" placeholder="個数" min="1"  value="{{ old('quantity',$homeStartupItem->quantity) }}" oninput="calculateTotal()">
                            </div>
                            {{-- 登録ボタン --}}
                            <button type="submit" class="btn btn-store ms-2">登録</button>
                        </div>
                    </div>
    </div>
</div>

