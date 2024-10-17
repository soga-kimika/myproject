    {{-- 編集モーダルの中身--}}
    <div class="container">
        <div class="col-md-12 mx-auto"> 
            <div class="col-md-12 d-flex mb-3 flex-wrap">
                    <label class="mb-0">優先度：</label>
                    <div class="d-flex item-form">
                        <div class="form-check me-3">
                            <input type="radio" class="form-check-input" name="priority" value="high" id="edit_priority-high{{ $item->id }}" {{  old('priority', $item->priority) == 'high' ? 'checked' : '' }}>
                            <label class="form-check-label" for="edit_priority-high{{ $item->id }}">高 <i class="fa fa-star"></i></label>
                        </div>
                        <div class="form-check me-3">
                            <input type="radio" class="form-check-input" name="priority" value="medium" id="edit_priority-medium{{ $item->id }}" {{  old('priority', $item->priority)== 'medium' ? 'checked' : '' }}>
                            <label class="form-check-label" for="edit_priority-medium{{ $item->id }}">中 <i class="fa fa-star-half-alt"></i></label>
                        </div>
                        <div class="form-check me-3">
                            <input type="radio" class="form-check-input" name="priority" value="low" id="edit_priority-low{{ $item->id }}" {{ old('priority', $item->priority)== 'low' ? 'checked' : '' }}>
                            <label class="form-check-label" for="edit_priority-low{{ $item->id }}">低 <i class="far fa-star"></i></label>
                        </div>
                        {{-- アイディアのページだけ不要のラジオボタンを表示 --}}
                        @if($type ==='ideas')
                        <div class="form-check">
                            <input type="radio" class="form-check-input" name="priority" value="remove" id="edit_priority-remove{{ $item->id }}"{{ old('priority', $item->priority) == 'remove' ? 'checked' : '' }}>
                            <label class="form-check-label" for="edit_priority-remove{{ $item->id }}">不要 <i class="fa fa-times"></i></label>
                        </div>
                    @endif
                    </div>
                    <div class="d-flex align-items-center">
                        {{-- ファイル名表示 --}}
                        <input type="file" name="imageUpload" id="edit_imageUpload{{ $item->id }}" accept="image/*" class="d-none" onchange="displayFileName('edit_imageUpload{{ $item->id }}', 'modalFileName{{ $item->id }}')">
                        <span id="modalFileName{{ $item->id }}" class="ms-2 file-name">
                            {{ old('imageUpload', $item->image_name ? basename($item->image_name) : '画像はありません') }}
                        </span>
                    </div>
            </div>
            <div class="form-group d-flex align-items-center col-md-12">
                {{-- 要望入力欄 --}}
                <input type="text" name="request_message" id="edit_request_message" class="item-form-control form-control-lg me-2" placeholder="要望を記入してください" 
                value="{{ old('request_message', $item->request_message) }}" required >
                {{-- ファイル選択ボタン --}}
                <label for="edit_imageUpload{{ $item->id }}" class="btn me-2 form-check-label btn-select">画像を選択 <i class="fas fa-upload"></i> 
                </label>
                 {{-- 更新ボタン --}}
                <button type="submit" class="btn btn-update">更新</button>
            </div>
        </div>
    </div>
