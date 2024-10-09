{{-- ホームスタートアップカード --}}
<div class="container">
    <div class="row">
        <div class="col-md-12"> 
            {{-- 1つ目のカード --}}
            <div class="card mt-4">
                <div class="card-header">
                    <h3 class="card-title">ファニチャー</h3>
                </div>      
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap custom-table">
                        <tbody>
                            @php $totalPrice1 = 0; @endphp
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
                                    <td class="col-request">{{ $homeStartupItem->item_name }}</td>
                                    <td class="col-request">{{ $homeStartupItem->manufacturer }}</td>
                                    <td class="col-price">  
                                        ￥{{ number_format($homeStartupItem->price) }} 
                                    </td>
                                    <td class="col-quantity">{{ $homeStartupItem->quantity }} 個</td>
                                    <td class="col-amount">￥ {{ number_format($homeStartupItem->amount) }}</td>                                    
                                    <td class="col-edit">
                                        <a href="#" class="btn btn-edit" data-toggle="modal" data-target="#homeStartupItem-editModal{{ $homeStartupItem->id }}">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    </td>
                                    <td class="col-image">
                                        @if($homeStartupItem->image_url) 
                                            <a href="#" class="btn btn-infos" data-toggle="modal" data-target="#homeStartupItem-imageModal{{ $homeStartupItem->id }}">
                                                <i class="fas fa-image item-fa-image"></i>
                                            </a>
                                        @endif
                                    </td>
                                    <td class="col-checkbox">
                                        <input type="checkbox" class="check-consulted" data-id="{{ $homeStartupItem->id }}" >
                                    </td>
                                    @include('partials.home_startup.image_modal', ['id' => $homeStartupItem->id, 'homeStartupItem' => $homeStartupItem, 'imageUrl' => $homeStartupItem->image_url])
                                    @include('partials.home_startup.edit_modal', ['homeStartupItem' => $homeStartupItem])
                                </tr>
                                @php $totalPrice1 += $homeStartupItem->amount; @endphp
                            @endforeach
                        </tbody>
                    </table>
                    <div class="total-amount">
                        <strong>合計金額: ￥{{ number_format($totalPrice1) }}</strong>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12"> 
            {{-- アプライアンスのカード --}}
            <div class="card mt-4">
                <div class="card-header">
                    <h3 class="card-title">アプライアンス</h3>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap custom-table">
                        <tbody>
                            @php $totalPrice2 = 0; @endphp
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
                                    <td class="col-request">{{ $homeStartupItem->item_name }}</td>
                                    <td class="col-request">{{ $homeStartupItem->manufacturer }}</td>
                                    <td class="col-price">￥{{ number_format($homeStartupItem->price) }}</td>
                                    <td class="col-quantity">{{ $homeStartupItem->quantity }} 個</td>
                                    <td class="col-amount">￥{{ number_format($homeStartupItem->amount) }}</td>                                    
                                    <td class="col-edit">
                                        <a href="#" class="btn btn-edit" data-toggle="modal" data-target="#homeStartupItem-editModal{{ $homeStartupItem->id }}">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    </td>
                                    <td class="col-image">
                                        @if($homeStartupItem->image_url) 
                                            <a href="#" class="btn btn-infos" data-toggle="modal" data-target="#homeStartupItem-imageModal{{ $homeStartupItem->id }}">
                                                <i class="fas fa-image item-fa-image"></i>
                                            </a>
                                        @endif
                                    </td>
                                    <td class="col-checkbox">
                                        <input type="checkbox" class="check-consulted" data-id="{{ $homeStartupItem->id }}" style="margin-left: 8px;">
                                    </td>
                                    @include('partials.home_startup.image_modal', ['id' => $homeStartupItem->id, 'homeStartupItem' => $homeStartupItem, 'imageUrl' => $homeStartupItem->image_url])
                                    @include('partials.home_startup.edit_modal', ['homeStartupItem' => $homeStartupItem])
                                </tr>
                                @php $totalPrice2 += $homeStartupItem->amount; @endphp
                            @endforeach
                        </tbody>
                    </table>
                    <div class="total-amount">
                        <strong>合計金額: ￥{{ number_format($totalPrice2) }}</strong>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-12"> 
            {{-- アクセサリーズのカード --}}
            <div class="card mt-4">
                <div class="card-header">
                    <h3 class="card-title">アクセサリーズ</h3>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap custom-table">
                        <tbody>
                            @php $totalPrice3 = 0; @endphp
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
                                    <td class="col-request">{{ $homeStartupItem->item_name }}</td>
                                    <td class="col-request">{{ $homeStartupItem->manufacturer }}</td>
                                    <td class="col-price">￥{{ number_format($homeStartupItem->price) }}</td>
                                    <td class="col-quantity">{{ $homeStartupItem->quantity }} 個</td>
                                    <td class="col-amount">￥{{ number_format($homeStartupItem->amount) }}</td>                                    
                                    <td class="col-edit">
                                        <a href="#" class="btn btn-edit" data-toggle="modal" data-target="#homeStartupItem-editModal{{ $homeStartupItem->id }}">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    </td>
                                    <td class="col-image">
                                        @if($homeStartupItem->image_url) 
                                            <a href="#" class="btn btn-infos" data-toggle="modal" data-target="#homeStartupItem-imageModal{{ $homeStartupItem->id }}">
                                                <i class="fas fa-image item-fa-image"></i>
                                            </a>
                                        @endif
                                    </td>
                                    <td class="col-checkbox">
                                        <input type="checkbox" class="check-consulted" data-id="{{ $homeStartupItem->id }}" style="margin-left: 8px;">
                                    </td>
                                        @include('partials.home_startup.image_modal', ['id' => $homeStartupItem->id, 'homeStartupItem' => $homeStartupItem, 'imageUrl' => $homeStartupItem->image_url])
                                    @include('partials.home_startup.edit_modal', ['homeStartupItem' => $homeStartupItem])
                                </tr>
                                @php $totalPrice3 += $homeStartupItem->amount; @endphp
                            @endforeach
                        </tbody>
                    </table>
                    <div class="total-amount">
                        <strong>合計金額: ￥{{ number_format($totalPrice3) }}</strong>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
