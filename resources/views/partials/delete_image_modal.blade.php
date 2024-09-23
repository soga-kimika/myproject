{{-- アイテム1の削除モーダル --}}

    <div class="modal fade" id="deleteImageModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteImageModalLabel{{ $item->id }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="deleteImageModalLabel{{ $item->id }}">削除確認画面</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label>データを削除しますか？</label>
                </div>
                <div class="modal-footer">
                    <form method="POST" action="{{ route('items.destroy', ['type' => $type, 'itemId' => $item->id]) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">削除</button>
                    </form>
                    <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
                </div>
            </div>
        </div>
    </div>


{{-- アイテム2の削除モーダル
@foreach($items2 as $item2)
    <div class="modal fade" id="deleteImageModal{{ $item2->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteImageModalLabel{{ $item2->id }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="deleteImageModalLabel{{ $item2->id }}">削除確認画面</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label>データを削除しますか？</label>
                </div>
                <div class="modal-footer">
                    <form method="POST" action="{{ route('items.destroy', ['type' => $type, 'itemId' => $item2->id]) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">削除</button>
                    </form>
                    <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
                </div>
            </div>
        </div>
    </div>
@endforeach --}}
