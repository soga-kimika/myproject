{{-- 画像削除モーダル --}}
<div class="modal fade" id="deleteImageModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteImageModalLabel{{ $item->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            {{-- モーダルヘッダー --}}
            <div class="modal-header">
                <h4 class="modal-title" id="deleteImageModalLabel{{ $item->id }}">画像削除確認</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {{-- モーダル中身 --}}
            <div class="modal-body">
                <label>この画像を削除しますか？</label>
            </div>
            {{-- モーダルフッター --}}
            <div class="modal-footer">
                <form method="POST" action="{{ route('items.deleteImage', ['type' => $type, 'itemId' => $item->id]) }}">
                    @csrf
                    @method('DELETE')
                    {{-- 削除ボタン --}}
                    <button type="submit" class="btn btn-dangers"><i class="fa fa-trash-alt"></i></button>
                </form>
                {{-- 閉じるボタン --}}
                <button type="button" class="btn btn-defaults" data-dismiss="modal"><i class="fa fa-undo-alt"></i></button>
            </div>
        </div>
    </div>
</div>
