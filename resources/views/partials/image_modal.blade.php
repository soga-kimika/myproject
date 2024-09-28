
    <div class="modal fade" id="imageModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel{{ $item->id }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="imageModalLabel{{ $item->id }}">画像</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @if($item->image_url)
                        <img src="{{ asset('storage/' . $item->image_url) }}" class="img-fluid" alt="Image" style="max-width: 100%; max-height: 80vh; object-fit: contain;">
                    @else
                        <p>画像はありません。</p>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteImageModal{{ $item->id }}"><i class="fa fa-trash-alt"></i></button>
                    @include('partials.delete_image_modal', ['id' => $item->id])
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-undo-alt"></i></button>
                </div>
            </div>
        </div>
    </div>

