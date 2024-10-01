{{-- 入力フォーム --}}
<div class="container">
    <div class="col-md-12 mx-auto"> 
        {{-- 送信先のアクションURLはコントローラーで提示 --}}
        <form action="{{route('items.store', ['type' => $type])}}" method="POST" enctype="multipart/form-data">
            @csrf
            {{-- 入力フォーム --}}
            <div class="border-bottom pb-2 mb-3 mt-4">
                <div class="col-md-12 d-flex mb-3">
                    <label class="mb-0">優先度：</label>
                    <div class="d-flex">
                        <div class="form-check me-3">
                            <input type="radio" class="form-check-input" name="priority" value="high" id="priority-high" checked>
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
                        {{-- アイディアのページだけ不要のラジオボタンを表示 --}}
                        @if($type ==='ideas')
                            <div class="form-check">
                                <input type="radio" class="form-check-input" name="priority" value="remove" id="priority-remove">
                                <label class="form-check-label" for="priority-remove">不要 <i class="fa fa-times"></i></label>
                            </div>
                        @endif
                    </div>
                    <div class="me-3"></div>
                    <label class="me-2 mb-0">カテゴリー：</label>
                    <div class="d-flex align-items-center">
                        {{-- ページタイトルから、カテゴリーを取得し、カテゴリーごとにカードに表示できるように紐づけ --}}
                        @foreach ($titles as $title)
                        <div class="form-check me-3">
                            <input type="radio" class="form-check-input" name="category" value="{{ $title['category'] }}" id="category-{{ $title['id'] }}" {{ $title['id'] == 1 ? 'checked' : '' }}>
                            <label class="form-check-label" for="category-{{ $title['id'] }}">{{ $title['title'] }}</label>
                        </div>
                        @endforeach
                    </div>
                </div>
                {{-- 要望欄 --}}
                <div class="form-group d-flex align-items-center col-md-12">
                    <input type="text" name="request_message" id="request_message" class="form-control form-control-lg me-2" placeholder="要望を記入してください" required >
                    {{-- 画像選択ボタン --}}
                    <label for="imageUpload" class="btn me-2 form-check-label btn-select" >
                        画像を選択 <i class="fas fa-upload"></i> 
                    </label>
                    <input type="file" name="imageUpload" id="imageUpload" accept="image/*" class="d-none">
                    {{-- 登録ボタン  --}}
                    <button type="submit" class="btn btn-store ms-2">登録</button>
                </div>
            </div>
        </form>
    </div>
</div>
