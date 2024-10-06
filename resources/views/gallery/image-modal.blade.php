{{-- ギャラリー画像モーダル --}}
    <div class="modal fade" id="deleteGalleryModal{{ $gallery->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteGalleryModalLabel{{ $gallery->id }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteGalleryModalLabel{{ $gallery->id }}">画像</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {{-- 画像モーダルの中身 --}}
                <div class="modal-body">
                        <img src="{{ asset('storage/' . $gallery->image_url) }}" class="img-fluid" alt="Image">
                </div>
                {{-- 画像モーダルフッター --}}
                <div class="modal-footer">
                    {{-- 閉じるボタン --}}
                    <button type="button" class="btn btn-defaults" data-dismiss="modal"><i class="fa fa-undo-alt"></i></button>
                </div>
            </div>
        </div>
    </div>
    
