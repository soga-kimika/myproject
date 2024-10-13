{{-- 削除モーダル --}}
<div class="modal fade" id="deleteGalleryModal{{ $gallery->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteGalleryModalLabel{{ $gallery->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            {{-- モーダルヘッダー --}}
            <div class="modal-header">
                <h5 class="modal-title" id="deleteGalleryModalLabel{{ $gallery->id }}">削除</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {{-- モーダルの中身 --}}
            <div class="modal-body">
                <p>画像を削除しますか？</p>
            </div>
            {{-- モーダルフッター --}}
            <div class="modal-footer">
                <form action="{{ route('galleries.destroy', [$gallery->id]) }}" method="POST">
                    @csrf
                    {{-- 削除ボタン --}}
                    @method('DELETE')
                    <button type="submit" class="btn btn-dangers"><i class="fa fa-trash-alt"></i></button>
                </form>
                {{-- 閉じるボタン --}}
                <button type="button" class="btn btn-defaults" data-dismiss="modal"><i class="fa fa-undo-alt"></i> </button>
            </div>
        </div>
    </div>
</div>
