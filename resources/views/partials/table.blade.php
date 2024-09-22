    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        {{-- カードタイトルは、$typeを引数に、getCardTitlesAndCategoriesByType関数で取得したタイトル --}}
                        <h3 class="card-title">{{ $title1 }}</h3>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap custom-table">
                            <thead>
                                <tr>
                                    <th class="col-priority">優先度</th>
                                    <th class="col-request">要望</th>
                                    <th class="col-edit">編集</th>
                                    <th class="col-image">画像</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- 入力フォームで選択した優先度のアイコンを表示 --}}
                                @foreach($items1 as $item1)
                                    <tr>
                                        <td class="col-priority">
                                            @switch($item1->priority)
                                                @case('high')
                                                    <i class="fa fa-star"></i>
                                                    @break
                                                @case('medium')
                                                    <i class="fa fa-star-half-alt"></i>
                                                    @break
                                                @case('low')
                                                    <i class="far fa-star"></i>
                                                    @break
                                                @case('remove')
                                                    <i class="fa fa-times"></i>
                                                    @break
                                                @default
                                                    不明
                                            @endswitch
                                        </td>
                                        {{-- アイテム１に格納されている要望を表示 --}}
                                        <td>{{ $item1->request_message }}</td> 
                                        {{-- 編集ボタン--}}
                                        <td>
                                            <a href="#" class="btn btn-primary btn-edit" data-toggle="modal" data-target="#editModal{{ $item1->id }}">編集</a>
                                            {{-- フォームで画像を投稿していれば、画像のアイコンを表示 --}}
                                        </td>
                                        <td>
                                            @if($item1->image_url)
                                                <a href="#" class="btn btn-info" data-toggle="modal" data-target="#imageModal{{ $item1->id }}">
                                                    <i class="fas fa-image"></i>
                                                </a>
                                            @endif
                                        </td>
                                        {{-- 画像を表示するモーダル --}}
                                        @include('partials.image_modal', ['id' => $item1->id, 'imageUrl' => $item1->image_url])
                                        {{-- 編集を表示するモーダル --}}
                                        @include('partials.edit_modal', ['item' => $item1])
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mt-4 mt-md-0">
                    <div class="card-header">
                         {{-- カードタイトルは、$typeを引数に、getCardTitlesAndCategoriesByType関数で取得したタイトル --}}
                        <h3 class="card-title">{{ $title2 }}</h3>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap custom-table">
                            <thead>
                                <tr>
                                    <th class="col-priority">優先度</th>
                                    <th class="col-request">要望</th>
                                    <th class="col-edit">編集</th>
                                    <th class="col-image">画像</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($items2 as $item2)
                                 {{-- 入力フォームで選択した優先度のアイコンを表示 --}}
                                    <tr>
                                        <td class="col-priority">
                                            @switch($item2->priority)
                                                @case('high')
                                                    <i class="fa fa-star"></i>
                                                    @break
                                                @case('medium')
                                                    <i class="fa fa-star-half-alt"></i>
                                                    @break
                                                @case('low')
                                                    <i class="far fa-star"></i>
                                                    @break
                                                @case('remove')
                                                    <i class="fa fa-times"></i>
                                                    @break
                                                @default
                                                    不明    
                                            @endswitch
                                        </td>
                                             {{-- アイテム１に格納されている要望を表示 --}}
                                            <td>{{ $item2->request_message }}</td>
                                            {{-- 編集ボタン --}}
                                            <td>
                                                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#editModal{{ $item2->id }}">編集</a>
                                            </td>   
                                            <td >
                                                {{-- フォームで画像を投稿していれば、画像のアイコンを表示 --}}
                                                @if($item2->image_url)
                                                    <a href="#" class="btn btn-info" data-toggle="modal" data-target="#imageModal{{ $item2->id }}">
                                                        <i class="fas fa-image"></i>
                                                    </a>
                                                @endif
                                        </td>
                                         {{-- 画像を表示するモーダル --}}
                                        @include('partials.image_modal', ['id' => $item2->id, 'imageUrl' => $item2->image_url])
                                         {{-- 編集を表示するモーダル --}}
                                        @include('partials.edit_modal', ['item' => $item2])
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
