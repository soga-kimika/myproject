<div class="container">
    <form action="{{ $actionUrl }}" method="POST" enctype="multipart/form-data">
        {{-- 送信先のアクションURLはコントローラーで提示 --}}
        <div class="col-md-12 mx-auto"> 
            @csrf
            {{-- 入力フォーム --}}
            <div class="col-md-12 d-flex mb-3">
                {{-- @if(count($filteredTitles) > 0) --}}
                    <label class="mb-0">優先度：</label>
                    <div class="d-flex">
                        <div class="form-check me-3">
                            <input type="radio" class="form-check-input" name="edit_priority" value="high" id="priority-high">
                            <label class="form-check-label" for="priority-high">高 <i class="fa fa-star"></i></label>
                        </div>
                        <div class="form-check me-3">
                            <input type="radio" class="form-check-input" name="edit_priority" value="medium" id="priority-medium">
                            <label class="form-check-label" for="priority-medium">中 <i class="fa fa-star-half-alt"></i></label>
                        </div>
                        <div class="form-check me-3">
                            <input type="radio" class="form-check-input" name="edit_priority" value="low" id="priority-low">
                            <label class="form-check-label" for="priority-low">低 <i class="far fa-star"></i></label>
                        </div>
                       @if($type ==='ideas')
                        <div class="form-check me-3">
                            <input type="radio" class="form-check-input" name="edit_priority" value="remove" id="priority-remove">
                            <label class="form-check-label" for="priority-remove">不要<i class="far fa-times"></i></label>
                        </div>
                        @endif
                    </div>
                {{-- @endif --}}
            </div>
            <div class="form-group d-flex align-items-center col-md-12">
                <input type="text" name="edit_request_message" id="edit_request_message" class="form-control form-control-lg me-2" placeholder="要望を記入してください" 
                required style="flex: 1;" >
            </div>
        </div>
    </form>
</div>
