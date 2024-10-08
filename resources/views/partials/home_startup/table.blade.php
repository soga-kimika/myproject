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
                                    <td class="col-price">
                                        <input type="number" class="form-control price" name="price[]" placeholder="金額" step="0.01" min="0" value="{{ old('price', $homeStartupItem->price) }}" oninput="calculateTotal(this)">
                                    </td>
                                    <td class="col-quantity">
                                        <input type="number" class="form-control quantity" name="quantity[]" placeholder="個数" min="1" value="{{ old('quantity', $homeStartupItem->quantity) }}" oninput="calculateTotal(this)">
                                    </td>
                                    <td class="col-amount">
                                        <input type="number" class="form-control amount" name="amount[]" placeholder="合計" step="0.01" min="0" readonly value="{{ old('amount', $homeStartupItem->amount) }}">
                                    </td>
                                    <td class="col-edit">
                                        <a href="#" class="btn btn-edit" data-toggle="modal" data-target="#homeStartupItem-editModal{{ $homeStartupItem->id }}" 
                                            data-request="{{ $homeStartupItem->item_name }}" data-priority="{{ $homeStartupItem->priority }}" 
                                            data-image-name="{{ $homeStartupItem->image_name }}" data-image-url="{{ $homeStartupItem->image_url }}"
                                            data-price="{{ $homeStartupItem->price }}" data-quantity="{{ $homeStartupItem->quantity }}" data-amount="{{ $homeStartupItem->amount }}">
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
                            @endforeach
                        </tbody>
                    </table>
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
                                    <td class="col-price">
                                        <input type="number" class="form-control price" name="price[]" placeholder="金額" step="0.01" min="0" value="{{ old('price', $homeStartupItem->price) }}" oninput="calculateTotal(this)">
                                    </td>
                                    <td class="col-quantity">
                                        <input type="number" class="form-control quantity" name="quantity[]" placeholder="個数" min="1" value="{{ old('quantity', $homeStartupItem->quantity) }}" oninput="calculateTotal(this)">
                                    </td>
                                    <td class="col-amount">
                                        <input type="number" class="form-control amount" name="amount[]" placeholder="合計" step="0.01" min="0" readonly value="{{ old('amount', $homeStartupItem->amount) }}">
                                    </td>
                                    <td class="col-edit">
                                        <a href="#" class="btn btn-edit" data-toggle="modal" data-target="#homeStartupItem-editModal{{ $homeStartupItem->id }}" 
                                            data-request="{{ $homeStartupItem->item_name }}" data-priority="{{ $homeStartupItem->priority }}" 
                                            data-image-name="{{ $homeStartupItem->image_name }}" data-image-url="{{ $homeStartupItem->image_url }}">
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
                            @endforeach
                        </tbody>
                    </table>
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
                                    <td class="col-price">
                                        <input type="number" class="form-control price" name="price[]" placeholder="金額" step="0.01" min="0" value="{{ old('price', $homeStartupItem->price) }}" oninput="calculateTotal(this)">
                                    </td>
                                    <td class="col-quantity">
                                        <input type="number" class="form-control quantity" name="quantity[]" placeholder="個数" min="1" value="{{ old('quantity', $homeStartupItem->quantity) }}" oninput="calculateTotal(this)">
                                    </td>
                                    <td class="col-amount">
                                        <input type="number" class="form-control amount" name="amount[]" placeholder="合計" step="0.01" min="0" readonly value="{{ old('amount', $homeStartupItem->amount) }}">
                                    </td>
                                    <td class="col-edit">
                                        <a href="#" class="btn btn-edit" data-toggle="modal" data-target="#homeStartupItem-editModal{{ $homeStartupItem->id }}" 
                                            data-request="{{ $homeStartupItem->item_name }}" data-priority="{{ $homeStartupItem->priority }}" 
                                            data-image-name="{{ $homeStartupItem->image_name }}" data-image-url="{{ $homeStartupItem->image_url }}">
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
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
