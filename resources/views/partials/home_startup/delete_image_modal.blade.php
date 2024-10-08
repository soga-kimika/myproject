{{-- ホームスタートアップ画像削除モーダル --}}
<div class="modal fade" id="homeStartupItem_imagedelteModal{{ $homeStartupItem->id }}" tabindex="-1" role="dialog" aria-labelledby="homeStartupItem_imagedelteModal{{ $homeStartupItem->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            {{-- モーダルヘッダー --}}
            <div class="modal-header">
                <h4 class="modal-title" id="homeStartupItem_imagedelteModalLabel{{ $homeStartupItem->id }}">画像削除</h4>
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
                <form method="POST" action="{{ route('homeStartupItems.deleteImage', [ 'homeStartupItemId' => $homeStartupItem->id]) }}">
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
