{{-- アイテム1のモーダル --}}

    <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $item->id }}" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="editModalLabel{{ $item->id }}">編集</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ route('items.update', ['type' => $type, 'itemId' => $item->id]) }}">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        @include('partials.form_modal', ['actionUrl' => route('items.update', ['type' => $type, 'itemId' => $item->id]), 'submitButtonText' => '更新'])
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-update">更新</button>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{ $item->id }}">削除</button>
                        @include('partials.delete_modal', ['id' => $item->id])
                        <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


{{-- アイテム2のモーダル --}}
{{-- 
    <div class="modal fade" id="editModal{{ $item2->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $item2->id }}" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="editModalLabel{{ $item2->id }}">編集</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ route('items.update', ['type' => $type, 'itemId' => $item2->id]) }}">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        @include('partials.form_modal', ['actionUrl' => route('items.update', ['type' => $type, 'itemId' => $item2->id]), 'submitButtonText' => '更新'])
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">更新</button>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{ $item2->id }}">削除</button>
                        @include('partials.delete_modal', ['id' => $item2->id,'item' => $item2])
                        <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
                    </div>
                </form>
            </div>
        </div>
    </div> --}}

