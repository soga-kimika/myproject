<div class="container">
    <div class="col-md-12 mx-auto"> 
                    <div class="border-bottom pb-2 mb-3 mt-4">
                        <div class="col-md-12 d-flex mb-3">
                            <label class="mb-0">優先度：</label>
                            <div class="d-flex">
                                <div class="form-check me-3">
                                    <input type="radio" class="form-check-input" name="priority" value="high" id="priority-high" {{ old('priority', $homeStartupItem->priority) == 'high' ? 'checked' : '' }}>
                                    <label class="form-check-label radio" for="priority-high">高 <i class="fa fa-star"></i></label>
                                </div>
                                <div class="form-check me-3">
                                    <input type="radio" class="form-check-input" name="priority" value="medium" id="priority-medium" {{ old('priority',$homeStartupItem->priority) == 'medium' ? 'checked' : '' }}>
                                    <label class="form-check-label radio" for="priority-medium">中 <i class="fa fa-star-half-alt"></i></label>
                                </div>
                                <div class="form-check me-3">
                                    <input type="radio" class="form-check-input" name="priority" value="low" id="priority-low" {{ old('priority',$homeStartupItem->priority) == 'low' ? 'checked' : '' }}>
                                    <label class="form-check-label radio" for="priority-low">低 <i class="far fa-star"></i></label>
                                </div>
                            </div>
                            {{-- ファイル名表示 --}}
                            <div class="d-flex align-items-center">
                                <input type="file" name="imageUpload" id="imageUpload" accept="image/*" class="d-none" onchange="displayFileName('imageUpload', 'fileName')">
                                <span id="fileName" class="ms-2 file-name"></span>
                            </div>
                        </div>

                        {{-- 品名欄 --}}
                        <div class="form-group d-flex align-items-center col-md-12 mb-3">
                            <input type="text" name="item_name" id="item_name" class="item-form-control form-control-lg me-2" placeholder="品名" value="{{ old('item_name',$homeStartupItem->item_name) }}"  >
                         {{-- メーカー・型番記入欄 --}}
                         <input type="text" name="manufacturer" id="manufacturer" class="item-form-control form-control-lg me-2" placeholder="メーカー・型番"value="{{ old('manufacturer',$homeStartupItem->manufacturer) }}" > 
                            {{-- 金額、個数、合計 --}}
                            <div class="d-flex ">
                                <input type="number" name="quantity" class="form-control quantity-form-control me-2" placeholder="個数" min="1"  value="{{ old('quantity',$homeStartupItem->quantity) }}" oninput="calculateTotal()">
                                <input type="number" name="price" class="form-control price-form-control me-2" placeholder="金額" step="1000" min="1000" value="{{ old('price',$homeStartupItem->price) }}" oninput="calculateTotal()">
                                      <input type="number" name="amount" id="amount" class="form-control amount-form-control" placeholder="合計" step="1000" min="0"  readonly>
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

