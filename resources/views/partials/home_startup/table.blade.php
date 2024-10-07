{{-- ホームスタートアップカード --}}
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">ファニチャー</h3>
                </div>
                <div class="card-body table-responsive p-0">    
                    <table class="table table-hover text-nowrap custom-table">
                        <tbody>
                            @foreach($homeStartupItems1 as $homeStartupItem1)
                                <tr>
                                    <td class="btn-priority col-priority">
                                        @switch($homeStartupItem1->priority)
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
                                    <td class="col-request">{{ $homeStartupItem1->request_message }}</td> 
                                    <td class="col-edit">
                                        <a href="#" class="btn btn-edit" data-toggle="modal" data-target="#homeStartupItem-editModal{{ $homeStartupItem1->id }}" data-request="{{ $homeStartupItem1->request_message }}" data-priority="{{ $homeStartupItem1->priority }}" data-image-name="{{ $homeStartupItem1->image_name }}" data-image-url="{{ $homeStartupItem1->image_url }}">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    </td>
                                    <td class="col-image">
                                        @if($homeStartupItem1->image_url)
                                            <a href="#" class="btn btn-infos" data-toggle="modal" data-target="#homeStartupItem-imageModal{{ $homeStartupItem1->id }}">
                                                <i class="fas fa-image item-fa-image"></i>
                                            </a>
                                        @endif
                                    </td>
                                    <td class="col-checkbox">
                                        <input type="checkbox" class="check-consulted" data-id="{{ $homeStartupItem1->id }}" style="margin-left: 8px;">
                                    </td>
                                    @include('partials.home_startup.image_modal', ['id' => $homeStartupItem1->id, 'item' => $homeStartupItem1, 'imageUrl' => $homeStartupItem1->image_url])
                                    @include('partials.home_startup.edit_modal', ['item' => $homeStartupItem1])
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mt-4 mt-md-0">
                <div class="card-header">
                    <h3 class="card-title">アプライアンス</h3>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap custom-table">
                        <tbody>
                            @foreach($homeStartupItems2 as $homeStartupItem2)
                                <tr>
                                    <td class="btn-priority col-priority">
                                        @switch($homeStartupItem2->priority)
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
                                    <td class="col-request">{{ $homeStartupItem2->request_message }}</td>
                                    <td class="col-edit">
                                        <a href="#" class="btn btn-edit" data-toggle="modal" data-target="#homeStartupItem-editModal{{ $homeStartupItem2->id }}" data-request="{{ $homeStartupItem2->request_message }}" data-priority="{{ $homeStartupItem2->priority }}" data-image-name="{{ $homeStartupItem2->image_name }}" data-image-url="{{ $homeStartupItem2->image_url }}">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    </td>
                                    <td class="col-image">
                                        @if($homeStartupItem2->image_url)
                                            <a href="#" class="btn btn-infos" data-toggle="modal" data-target="#homeStartupItem-imageModal{{ $homeStartupItem2->id }}">
                                                <i class="fas fa-image item-fa-image"></i>
                                            </a>
                                        @endif
                                    </td>
                                    <td class="col-checkbox">
                                        <input type="checkbox" class="check-consulted" data-id="{{ $homeStartupItem2->id }}" style="margin-left: 8px;">
                                    </td>
                                    @include('partials.image_modal', ['id' => $homeStartupItem2->id, 'item' => $homeStartupItem2, 'imageUrl' => $homeStartupItem2->image_url])
                                    @include('partials.edit_modal', ['item' => $homeStartupItem2])
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mt-4 mt-md-0">
                <div class="card-header">
                    <h3 class="card-title">アクセサリーズ</h3>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap custom-table">
                        <tbody>
                            @foreach($homeStartupItems3 as $homeStartupItem3)
                                <tr>
                                    <td class="btn-priority col-priority">
                                        @switch($homeStartupItem3->priority)
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
                                    <td class="col-request">{{ $homeStartupItem3->request_message }}</td>
                                    <td class="col-edit">
                                        <a href="#" class="btn btn-edit" data-toggle="modal" data-target="#homeStartupItem-editModal{{ $homeStartupItem3->id }}" data-request="{{ $homeStartupItem3->request_message }}" data-priority="{{ $homeStartupItem3->priority }}" data-image-name="{{ $homeStartupItem3->image_name }}" data-image-url="{{ $homeStartupItem3->image_url }}">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    </td>
                                    <td class="col-image">
                                        @if($homeStartupItem3->image_url)
                                            <a href="#" class="btn btn-infos" data-toggle="modal" data-target="#homeStartupItem-imageModal{{ $homeStartupItem3->id }}">
                                                <i class="fas fa-image item-fa-image"></i>
                                            </a>
                                        @endif
                                    </td>
                                    <td class="col-checkbox">
                                        <input type="checkbox" class="check-consulted" data-id="{{ $homeStartupItem3->id }}" style="margin-left: 8px;">
                                    </td>
                                    @include('partials.image_modal', ['id' => $homeStartupItem3->id, 'item' => $homeStartupItem3, 'imageUrl' => $homeStartupItem3->image_url])
                                    @include('partials.edit_modal', ['item' => $homeStartupItem3])
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
