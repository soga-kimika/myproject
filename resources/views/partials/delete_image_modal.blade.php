<div class="modal fade" id="deleteImageModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteImageModalLabel{{ $item->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="deleteImageModalLabel{{ $item->id }}">画像削除確認</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <label>この画像を削除しますか？</label>
            </div>
            <div class="modal-footer">
                <form method="POST" action="{{ route('items.deleteImage', ['type' => $type, 'itemId' => $item->id]) }}">
                    @csrf
                    <button type="submit" class="btn btn-danger">削除</button>
                </form>
                <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
            </div>
        </div>
    </div>
</div>
