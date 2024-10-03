{{-- 編集モーダルの中身--}}
<div class="container">
    <div class="col-md-12 mx-auto"> 
        <div class="col-md-12 d-flex mb-3">
                <label class="mb-0">優先度：</label>
                <div class="d-flex">
                    <div class="form-check me-3">
                        <input type="radio" class="form-check-input" name="priority" value="high" id="priority-high" {{  old('priority', $item->priority) == 'high' ? 'checked' : '' }}>
                        <label class="form-check-label" for="priority-high">高 <i class="fa fa-star"></i></label>
                    </div>
                    <div class="form-check me-3">
                        <input type="radio" class="form-check-input" name="priority" value="medium" id="priority-medium" {{  old('priority', $item->priority)== 'medium' ? 'checked' : '' }}>
                        <label class="form-check-label" for="priority-medium">中 <i class="fa fa-star-half-alt"></i></label>
                    </div>
                    <div class="form-check me-3">
                        <input type="radio" class="form-check-input" name="priority" value="low" id="priority-low" {{ old('priority', $item->priority)== 'low' ? 'checked' : '' }}>
                        <label class="form-check-label" for="priority-low">低 <i class="far fa-star"></i></label>
                    </div>
                    {{-- アイディアのページだけ不要のラジオボタンを表示 --}}
                    @if($type ==='ideas')
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="priority" value="remove" id="priority-remove"{{ old('priority', $item->priority) == 'remove' ? 'checked' : '' }}>
                        <label class="form-check-label" for="priority-remove">不要 <i class="fa fa-times"></i></label>
                    </div>
                @endif
                </div>
                <div class="d-flex align-items-center">
                    {{-- ファイル名表示 --}}
                    
                    <input type="file" name="imageUpload" id="imageUpload" accept="image/*" class="d-none" onchange="displayFileName()">
                    <span id="modalFileName" class="ms-2 file-name"></span>
                        </div>
        </div>
        <div class="form-group d-flex align-items-center col-md-12">
            {{-- 要望入力欄 --}}
            <input type="text" name="request_message" id="edit_request_message" class="form-control form-control-lg me-2" placeholder="要望を記入してください" 
            value="{{ old('request_message', $item->request_message) }}" required >
            {{-- 画像選択ボタン --}}
            <label for="imageUpload" class="btn me-2 form-check-label btn-select">
                画像を選択 <i class="fas fa-upload"></i> 
            </label>
        </div>
    </div>
</div>
