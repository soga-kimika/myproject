<div class="container">
    <div class="col-md-12 mx-auto"> 
        <form action="{{ $actionUrl }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="border-bottom pb-2 mb-3 mt-4">
                <div class="col-md-12 d-flex mb-3">
                    <label class="mb-0">優先度：</label>
                    <div class="d-flex">
                        <div class="form-check me-3">
                            <input type="radio" class="form-check-input" name="priority" value="high" id="priority-high">
                            <label class="form-check-label" for="priority-high">高 <i class="fa fa-star"></i></label>
                        </div>
                        <div class="form-check me-3">
                            <input type="radio" class="form-check-input" name="priority" value="medium" id="priority-medium">
                            <label class="form-check-label" for="priority-medium">中 <i class="fa fa-star-half-alt"></i></label>
                        </div>
                        <div class="form-check me-3">
                            <input type="radio" class="form-check-input" name="priority" value="low" id="priority-low">
                            <label class="form-check-label" for="priority-low">低 <i class="far fa-star"></i></label>
                        </div>
                        @if ($showRemoveOption)
                            <div class="form-check">
                                <input type="radio" class="form-check-input" name="priority" value="remove" id="priority-remove">
                                <label class="form-check-label" for="priority-remove">不要 <i class="fa fa-times"></i></label>
                            </div>
                        @endif
                    </div>
                    <div class="me-3"></div>
                    <label class="me-2 mb-0">カテゴリー：</label>
                    <div class="d-flex align-items-center">
                        @foreach ($titles as $title)
                        <div class="form-check me-3">
                            <input type="radio" class="form-check-input" name="category" value="{{ $title['category'] }}" id="category-{{ $title['id'] }}">
                            <label class="form-check-label" for="category-{{ $title['id'] }}">{{ $title['title'] }}</label>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="form-group d-flex align-items-center col-md-12">
                    <input type="text" name="request_message" id="request_message" class="form-control form-control-lg me-2" placeholder="要望を記入してください" required style="flex: 1;">
                    <label for="imageUpload" class="btn btn-primary me-2 form-check-label" style="cursor: pointer;">
                        画像を選択 <i class="fas fa-upload"></i> 
                    </label>
                    <input type="file" name="imageUpload" id="imageUpload" accept="image/*" class="d-none"> 
                    <button type="submit" class="btn btn-primary ms-2">{{ $submitButtonText }}</button>
                </div>
            </div>
        </form>
    </div>
</div>
