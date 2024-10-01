
    {{-- 画像モーダル --}}
    <div class="modal fade" id="imageModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel{{ $item->id }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="imageModalLabel{{ $item->id }}">画像</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {{-- 画像モーダルの中身 --}}
                <div class="modal-body">
                        <img src="{{ asset('storage/' . $item->image_url) }}" class="img-fluid" alt="Image">
                </div>
                {{-- 画像モーダルフッター --}}
                <div class="modal-footer">
                    {{-- 削除ボタン --}}
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteImageModal{{ $item->id }}"><i class="fa fa-trash-alt"></i></button>
                    {{-- 削除モーダルを読み込み --}}
                    @include('partials.delete_image_modal', ['id' => $item->id])
                    {{-- 閉じるボタン --}}
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-undo-alt"></i></button>
                </div>
            </div>
        </div>
    </div>

