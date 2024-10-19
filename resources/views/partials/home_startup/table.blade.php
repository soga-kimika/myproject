<div class="container">
    <div class="row">

            {{-- 全てのカードの合計金額 --}}
            <div class="overall-total">
                <span class="overall-total-lavel"> 全体の合計：</span>
            <span id="overall-total" class="overall-totals">￥0</span>
            </div>
            <div class="col-md-12"> 
                 {{-- ファニチャーのカード --}}
            <div class="card">
                <div class="card-header d-flex justify-content-between home-card-title">
                    <h3 class="homeStartupItem-card-title card-title"><i class="fas fa-shopping-basket"></i>ファニチャー　</h3>
                    {{-- ファニチャーのカードの合計表示 --}}
                    @php $totalPrice1 = 0; @endphp
                    <strong class="total-amount">￥{{ number_format($totalPrice1) }}</strong>
                </div>                   
                {{-- ファニチャーのカードの中身 --}}
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap custom-table homeStartupItem-table">
                        <tbody>
                            @foreach($homeStartupItems1 as $homeStartupItem)
                                <tr>
                                    <td class="btn-priority col-priority">
                                        @switch($homeStartupItem->priority)
                                            @case('high') <i class="fa fa-star"></i> @break
                                            @case('medium') <i class="fa fa-star-half-alt"></i> @break
                                            @case('low') <i class="far fa-star"></i> @break
                                            @case('remove') <i class="fa fa-times"></i> @break
                                            @default 不明
                                        @endswitch  
                                    </td>
                                    <td class="col-request homeStartupItem-col-request">{{ $homeStartupItem->item_name }}</td>
                                    <td class="col-request homeStartupItem-col-request">{{ $homeStartupItem->manufacturer }}</td>
                                    <td class="col-quantity homeStartupItem-col-price">{{  number_format((int)$homeStartupItem->price) }}  </td>
                                    <td class="homeStartupItem-col-symbols">×</td>
                                    <td class="col-quantity homeStartupItem-col-quantity">{{ $homeStartupItem->quantity }} </td>
                                     <td class="homeStartupItem-col-symbols" >=</td>
                                    <td class="col-amount homeStartupItem-col-amount">{{ number_format($homeStartupItem->amount) }}</td>                                    
                                    <td class="col-edit">
                                        <a href="#" class="btn btn-edit" data-toggle="modal" data-target="#homeStartupItem-editModal{{ $homeStartupItem->id }}">
                                            <i class="far fa-edit"></i>
                                        </a>
                                    </td>
                                    {{-- 画像 --}}
                                    <td class="col-image">
                                        @if($homeStartupItem->image_url) 
                                            <a href="#" class="btn btn-infos" data-toggle="modal" data-target="#homeStartupItem-imageModal{{ $homeStartupItem->id }}">
                                                <i class="far fa-image item-fa-image"></i>
                                            </a>
                                        @endif
                                    </td>
                                     {{-- チェックボックス、新規追加時はチェックされた状態で表示 --}}
                                    <td class="col-checkbox">
                                        <input type="checkbox" class="check-consulted" data-id="{{ $homeStartupItem->id }}" checked> 
                                    </td>
                                    {{-- 画像モーダル・編集モーダル読み込み --}}
                                    @include('partials.home_startup.image_modal', ['id' => $homeStartupItem->id, 'homeStartupItem' => $homeStartupItem, 'imageUrl' => $homeStartupItem->image_url])
                                    @include('partials.home_startup.edit_modal', ['homeStartupItem' => $homeStartupItem])
                                </tr>
                                @php $totalPrice1 += $homeStartupItem->amount; @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-12"> 
            {{-- アプライアンスのカード --}}
            <div class="card">
                <div class="card-header d-flex justify-content-between home-card-title">
                    <h3 class="card-title"><i class="fas fa-shopping-basket"></i>アプライアンス</h3>
                    {{-- アプライアンスの合計金額 --}}
                    @php $totalPrice2 = 0; @endphp
                    <strong class="total-amount">軽: ￥{{ number_format($totalPrice2) }}</strong>
                </div>
                 {{-- アプライアンスの中身 --}}
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap custom-table homeStartupItem-table">
                        <tbody>
                            @foreach($homeStartupItems2 as $homeStartupItem)
                                <tr>
                                    <td class="btn-priority col-priority">
                                        @switch($homeStartupItem->priority)
                                            @case('high') <i class="fa fa-star"></i> @break
                                            @case('medium') <i class="fa fa-star-half-alt"></i> @break
                                            @case('low') <i class="far fa-star"></i> @break
                                            @case('remove') <i class="fa fa-times"></i> @break
                                            @default 不明
                                        @endswitch  
                                    </td>
                                    <td class="col-request homeStartupItem-col-request">{{ $homeStartupItem->item_name }}</td>
                                    <td class="col-request homeStartupItem-col-request">{{ $homeStartupItem->manufacturer }}</td>
                                    <td class="col-quantity homeStartupItem-col-price"> {{ $homeStartupItem->price ? number_format((int)$homeStartupItem->price) : '-' }}  </td>
                                        <td class="homeStartupItem-col-symbols">×</td>
                                    <td class="col-quantity homeStartupItem-col-quantity">{{ $homeStartupItem->quantity }} </td>
                                    <td class="homeStartupItem-col-symbols">=</td>
                                    <td class="col-amount homeStartupItem-col-amount">{{ number_format($homeStartupItem->amount) }}</td>                                    
                                    <td class="col-edit">
                                        <a href="#" class="btn btn-edit" data-toggle="modal" data-target="#homeStartupItem-editModal{{ $homeStartupItem->id }}">
                                            <i class="far fa-edit"></i>
                                        </a>
                                    </td>
                                    {{-- 画像 --}}
                                    <td class="col-image">
                                        @if($homeStartupItem->image_url) 
                                            <a href="#" class="btn btn-infos" data-toggle="modal" data-target="#homeStartupItem-imageModal{{ $homeStartupItem->id }}">
                                                <i class="far fa-image item-fa-image"></i>
                                            </a>
                                        @endif
                                    </td>
                                     {{-- チェックボックス、新規追加時はチェックされた状態で表示 --}}
                                    <td class="col-checkbox">
                                        <input type="checkbox" class="check-consulted" data-id="{{ $homeStartupItem->id }}" checked > 
                                    </td>
                                      {{-- 画像モーダル・編集モーダル読み込み --}}
                                    @include('partials.home_startup.image_modal', ['id' => $homeStartupItem->id, 'homeStartupItem' => $homeStartupItem, 'imageUrl' => $homeStartupItem->image_url])
                                    @include('partials.home_startup.edit_modal', ['homeStartupItem' => $homeStartupItem])
                                </tr>
                                @php $totalPrice2 += $homeStartupItem->amount; @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-12"> 
            {{-- アクセサリーのカード --}}
            <div class="card">
                <div class="card-header d-flex justify-content-between home-card-title">
                    <h3 class="card-title homeStartupItem-card-title"><i class="fas fa-shopping-basket"></i>アクセサリー　</h3>
                    {{-- アクセサリーの合計金額 --}}
                    @php $totalPrice3 = 0; @endphp
                    <strong class="total-amount">計: ￥{{ number_format($totalPrice3) }}</strong>
                </div>
                {{-- アクセサリーの中身 --}}
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap custom-table homeStartupItem-table">
                        <tbody>
                            @foreach($homeStartupItems3 as $homeStartupItem)
                                <tr>
                                    <td class="btn-priority col-priority">
                                        @switch($homeStartupItem->priority)
                                            @case('high') <i class="fa fa-star"></i> @break
                                            @case('medium') <i class="fa fa-star-half-alt"></i> @break
                                            @case('low') <i class="far fa-star"></i> @break
                                            @case('remove') <i class="fa fa-times"></i> @break
                                            @default 不明
                                        @endswitch  
                                    </td>
                                    <td class="col-request homeStartupItem-col-request">{{ $homeStartupItem->item_name }}</td>
                                    <td class="col-request homeStartupItem-col-request">{{ $homeStartupItem->manufacturer }}</td>
                                    <td class="col-quantity homeStartupItem-col-price">{{ $homeStartupItem->price > 0 ? number_format((int)$homeStartupItem->price) : '-' }}  </td>    
                                    <td  class="homeStartupItem-col-symbols">×</td>
                                    <td class="col-quantity homeStartupItem-col-quantity">{{ $homeStartupItem->quantity }}</td>
                                    <td class="homeStartupItem-col-symbols">=</td>
                                    <td class="col-amount homeStartupItem-col-amount">{{ number_format($homeStartupItem->amount) }}</td>                                    
                                    <td class="col-edit">
                                        <a href="#" class="btn btn-edit" data-toggle="modal" data-target="#homeStartupItem-editModal{{ $homeStartupItem->id }}">
                                            <i class="far fa-edit"></i>
                                        </a>
                                    </td>
                                    <td class="col-image">
                                        @if($homeStartupItem->image_url) 
                                            <a href="#" class="btn btn-infos" data-toggle="modal" data-target="#homeStartupItem-imageModal{{ $homeStartupItem->id }}">
                                                <i class="far fa-image item-fa-image"></i>
                                            </a>
                                        @endif
                                    </td>
                                    <td class="col-checkbox">
                                        {{-- チェックボックス、新規追加時はチェックされた状態で表示 --}}
                                        <input type="checkbox" class="check-consulted" data-id="{{ $homeStartupItem->id }}" checked >                                        
                                    </td>
                                    {{-- 画像モーダル・編集モーダル読み込み --}}
                                    @include('partials.home_startup.image_modal', ['id' => $homeStartupItem->id, 'homeStartupItem' => $homeStartupItem, 'imageUrl' => $homeStartupItem->image_url])
                                    @include('partials.home_startup.edit_modal', ['homeStartupItem' => $homeStartupItem])
                                </tr>
                                @php $totalPrice3 += $homeStartupItem->amount; @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>  
