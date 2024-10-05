    {{-- カード --}}
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        {{-- カードタイトルは、$typeを引数に、getCardTitlesAndCategoriesByType関数で取得したタイトル --}}
                        <h3 class="card-title"> {!! $icon1 !!}{{ $title1 }}</h3>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap custom-table">
                            <tbody>
                                {{-- 入力フォームで選択した優先度のアイコンを表示 --}}
                                
                                @foreach($items1 as $item1)
                                    <tr>
                                       
                                        <td class="btn-priority col-priority">
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
                                        <td class="col-request" >{{ $item1->request_message }}</td> 
                                        {{-- 編集ボタン　モーダルトリガー　--}}
                                        <td class="col-edit">
                                            <a href="#" class="btn btn-edit" data-toggle="modal" data-target="#item-editModal{{ $item1->id }}" data-request="{{ $item1->request_message }}" data-priority="{{ $item1->priority }}"data-image-name="{{ $item1->image_name }}" 
                                                data-image-url="{{ $item1->image_url }}"><i class="fas fa-edit"></i></a>
                                            </a>
                                        </td>
                                        <td class="col-image">
                                            {{-- フォームで画像を投稿していれば、画像のアイコンを表示 トリガー--}}
                                            @if($item1->image_url)
                                                <a href="#" class="btn btn-infos" data-toggle="modal" data-target="#imageModal{{ $item1->id }}">
                                                    <i class="fas fa-image"></i>
                                                </a>
                                            @endif
                                        </td>
                                         <td class="col-checkbox">
                                             {{-- チェックボックス --}}
                                            <input type="checkbox" class="check-consulted" data-id="{{ $item1->id }}">
                                        </td>
                                        {{-- 画像を表示するモーダル --}}
                                        @include('partials.image_modal', ['id' => $item1->id, 'item' => $item1,'imageUrl' => $item1->image_url])
                                        {{-- 編集を表示するモーダル --}}
                                        @include('partials.edit_modal', ['item' => $item1,])
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
                         <h3 class="card-title">{!! $icon2 !!} {{ $title2 }} </h3>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap custom-table">
                            <tbody>
                                @foreach($items2 as $item2)
                                 {{-- 入力フォームで選択した優先度のアイコンを表示 --}}
                                    <tr> 
                                             <td class="btn-priority col-priority">
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
                                             {{-- アイテム２に格納されている要望を表示 --}}
                                            <td class="col-request">{{ $item2->request_message }}</td>
                                            {{-- 編集ボタン モーダルトリガー--}}
                                            <td class="col-edit">
                                            <a href="#" class="btn btn-edit" data-toggle="modal" data-target="#item-editModal{{ $item2->id }}" data-request="{{ $item2->request_message }}" data-priority="{{ $item2->priority }}"data-image-name="{{ $item2->image_name }}" 
                                                data-image-url="{{ $item2->image_url }}"><i class="fas fa-edit"></i></a>
                                            </td>   
                                            <td class="col-image">
                                                {{-- フォームで画像を投稿していれば、画像のアイコンを表示　画像モーダルトリガー --}}
                                                @if($item2->image_url)
                                                    <a href="#" class="btn btn-infos" data-toggle="modal" data-target="#imageModal{{ $item2->id }}">
                                                        <i class="fas fa-image item-fa-image-icon"></i>
                                                    </a>
                                                @endif
                                        </td>
                                        <td class="col-checkbox">
                                            {{-- チェックボタン --}}
                                            <input type="checkbox" class="check-consulted " data-id="{{ $item2->id }}" style="margin-left: 8px;">
                                            </td>
                                         {{-- 画像を表示するモーダル読み込み --}}
                                        @include('partials.image_modal', ['id' => $item2->id, 'item' => $item2,'imageUrl' => $item2->image_url])
                                         {{-- 編集を表示するモーダル読み込み --}}
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
