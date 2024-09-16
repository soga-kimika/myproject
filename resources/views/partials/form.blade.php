<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $title1 }}</h3>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap custom-table">
                        <thead>
                            <tr>
                                <th class="col-priority">優先度</th>
                                <th class="col-request">リクエスト</th>
                                <th class="col-edit">編集ボタン</th>
                                <th class="col-image">画像</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($items1 as $item1) 
                                <tr>
                                    <td>{{ $item1->name }}</td>
                                    <td>
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
                                    <td>{{ $item1->request_message }}</td>
                                    <td>
                                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#editModal{{ $item1->id }}">編集</a>
                                        @if($item1->image_url)
                                            <a href="#" class="btn btn-info" data-toggle="modal" data-target="#imageModal{{ $item1->id }}">
                                                <i class="fas fa-image"></i>
                                            </a>
                                        @endif
                                    </td>
                                    @include('partials.image_modal', ['id' => $item1->id, 'imageUrl' => $item1->image_url])
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
                    <h3 class="card-title">{{ $title2 }}</h3>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap custom-table">
                        <thead>
                            <tr>
                                <th class="col-priority">優先度</th>
                                <th class="col-request">リクエスト</th>
                                <th class="col-edit">編集ボタン</th>
                                <th class="col-image">画像</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($items2 as $item2)
                                <tr>
                                    <td>{{ $item2->name }}</td>
                                    <td>
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
                                    <td>{{ $item2->request_message }}</td>
                                    <td>
                                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#editModal{{ $item2->id }}">編集</a>
                                        @if($item2->image_url)
                                            <a href="#" class="btn btn-info" data-toggle="modal" data-target="#imageModal{{ $item2->id }}">
                                                <i class="fas fa-image"></i>
                                            </a>
                                        @endif
                                    </td>
                                    @include('partials.image_modal', ['id' => $item2->id, 'imageUrl' => $item2->image_url])
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
