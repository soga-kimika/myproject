    {{-- 入力フォーム --}}
    <div class="container">
        <div class="col-md-12 mx-auto"> 
            <form action="{{route('items.store', ['type' => $type])}}" method="POST" enctype="multipart/form-data">
                @csrf
                {{-- 入力フォーム --}}
                <div class="border-bottom pb-2 mb-3 mt-4">
                    <div class="col-md-12 d-flex flex-wrap mb-3 ">
                        <div class="d-flex me-3 item-form">
                            <label class="mb-1 me-2">優先度：</label>
                            <div class="form-check me-2">
                                <input type="radio" class="form-check-input" name="priority" value="high" id="priority-high" checked>
                                <label class="form-check-label radio" for="priority-high">高 <i class="fa fa-star"></i></label>
                            </div>
                            <div class="form-check me-2">
                                <input type="radio" class="form-check-input" name="priority" value="medium" id="priority-medium">
                                <label class="form-check-label radio" for="priority-medium">中 <i class="fa fa-star-half-alt"></i></label>
                            </div>
                            <div class="form-check me-2">
                                <input type="radio" class="form-check-input" name="priority" value="low" id="priority-low">
                                <label class="form-check-label radio" for="priority-low">低 <i class="far fa-star"></i></label>
                            </div>
                            @if($type === 'ideas')   
                                <div class="form-check me-2">
                                    <input type="radio" class="form-check-input" name="priority" value="remove" id="priority-remove">
                                    <label class="form-check-label" for="priority-remove">不要 <i class="fa fa-times"></i></label>
                                </div>
                            @endif
                        </div>
                        <div class="d-flex flex-wrap item-form">
                        <label class="me-2 mb-1">カテゴリー：</label>
                            @foreach ($titles as $title)
                                <div class="form-check me-2">
                                    <input type="radio" class="form-check-input" name="category" value="{{ $title['category'] }}" id="category-{{ $title['id'] }}" {{ $title['id'] == 1 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="category-{{ $title['id'] }}">{{ $title['title'] }}</label>
                                </div>
                            @endforeach
                        </div>
                        <div class="d-flex align-items-center item-image">
                            <label for="imageUpload" class="btn form-check-label btn-select item-btn-select">
                                画像を選択 <i class="fas fa-upload"></i> 
                            </label>
                            <input type="file" name="imageUpload" id="imageUpload" accept="image/*" class="d-none" onchange="displayFileName('imageUpload', 'fileName')">
                            <span id="fileName" class="ms-2 file-name"></span>
                        </div>
                    </div>
                    {{-- 要望欄 --}}
                    <div class="form-group d-flex align-items-center col-md-12 item-form-group">
                        <input type="text" name="request_message" id="request_message" class="item-form-control form-control-lg me-4" placeholder="要望を入力してください" required >
                        {{-- 登録ボタン  --}}
                        <button type="submit" class="btn btn-store ms-2">登録</button>
                    </div>
                    </div>
                </div>
                
            </form>
        </div>
    </div>
