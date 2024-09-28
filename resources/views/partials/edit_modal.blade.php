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
                <form method="POST" action="{{ route('items.update', ['type' => $type, 'itemId' => $item->id]) }} "enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        @include('partials.form_modal', ['actionUrl' => route('items.update', ['type' => $type, 'itemId' => $item->id])])
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-update"><i class="fas fa-check"></i></button>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{ $item->id }}"><i class="fa fa-trash-alt"></i></button>
                        @include('partials.delete_modal', ['id' => $item->id])
                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-undo-alt"></i></button>
                        </div>
                </form>
            </div>
        </div>
    </div>

