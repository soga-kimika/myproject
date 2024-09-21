<form action="{{ $actionUrl }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="form-group row border-bottom pb-2 mb-3">
        <div class="col-md-6 d-flex align-items-center">
            <label class="me-2 mb-0">優先度：</label>
            <div class="d-flex align-items-center">
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

                @if (!$showRemoveOption)
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
                        <input type="radio" class="form-check-input" name="category" value="{{ $title['id'] }}" id="category-{{ $title['id'] }}">
                        <label class="form-check-label" for="category-{{ $title['id'] }}">{{ $title['title'] }}</label>
                    </div>
                @endforeach
            </div>
        </div>
        <input type="file" name="imageUpload" id="imageUpload"  accept="image/*">
    </div>

    <div class="form-group d-flex align-items-center">
        <input type="text" name="request_message" id="request_message" class="form-control form-control-sm me-2" placeholder="要望を記入してください" style="width: 70%;" required>
        <button type="submit" class="btn btn-primary">{{ $submitButtonText }}</button>
    </div>
</form> 
