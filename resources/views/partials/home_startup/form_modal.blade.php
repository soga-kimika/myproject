{{-- 編集モーダルの中身 --}}
<div class="container">
    <div class="col-md-12 mx-auto">
        <form action="{{ route('homeStartupItem.update', ['homeStartupItemId' => $homeStartupItem->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="col-md-12 d-flex mb-3">
                <label class="mb-0">優先度：</label>
                <div class="d-flex">
                    <div class="form-check me-3">
                        <input type="radio" class="form-check-input" name="priority" value="high" id="edit_priority-high{{ $homeStartupItem->id }}" {{ old('priority', $homeStartupItem->priority) == 'high' ? 'checked' : '' }}>
                        <label class="form-check-label" for="edit_priority-high{{ $homeStartupItem->id }}">高 <i class="fa fa-star"></i></label>
                    </div>
                    <div class="form-check me-3">
                        <input type="radio" class="form-check-input" name="priority" value="medium" id="edit_priority-medium{{ $homeStartupItem->id }}" {{ old('priority', $homeStartupItem->priority) == 'medium' ? 'checked' : '' }}>
                        <label class="form-check-label" for="edit_priority-medium{{ $homeStartupItem->id }}">中 <i class="fa fa-star-half-alt"></i></label>
                    </div>
                    <div class="form-check me-3">
                        <input type="radio" class="form-check-input" name="priority" value="low" id="edit_priority-low{{ $homeStartupItem->id }}" {{ old('priority', $homeStartupItem->priority) == 'low' ? 'checked' : '' }}>
                        <label class="form-check-label" for="edit_priority-low{{ $homeStartupItem->id }}">低 <i class="far fa-star"></i></label>
                    </div>
                </div>
                <div class="d-flex align-items-center">
                    {{-- ファイル名表示 --}}
                    <input type="file" name="imageUpload" id="edit_imageUpload{{ $homeStartupItem->id }}" accept="image/*" class="d-none" onchange="displayFileName('edit_imageUpload{{ $homeStartupItem->id }}', 'modalFileName{{ $homeStartupItem->id }}')">
                    <span id="modalFileName{{ $homeStartupItem->id }}" class="ms-2 file-name">
                        {{ old('imageUpload', $homeStartupItem->image_name ? basename($homeStartupItem->image_name) : '画像はありません') }}
                    </span>
                </div>
            </div>
            <div class="form-group d-flex align-items-center col-md-12">
                {{-- 要望入力欄 --}}
                <input type="text" name="item_name" id="edit_item_name" class="item-form-control form-control-lg me-2" placeholder="要望を記入してください" value="{{ old('item_name', $homeStartupItem->item_name) }}" required>
                {{-- ファイル選択ボタン --}}
                <label for="edit_imageUpload{{ $homeStartupItem->id }}" class="btn me-2 form-check-label btn-select">
                    画像を選択 <i class="fas fa-upload"></i>
                </label>
                {{-- 更新ボタン --}}
                <button type="submit" class="btn btn-update">保存</button>
            </div>
        </form>
    </div>
</div>
