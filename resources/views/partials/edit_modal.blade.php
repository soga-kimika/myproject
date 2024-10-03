{{-- 編集モーダル --}}
    <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $item->id }}" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                {{-- モーダルヘッダー --}}
                <div class="modal-header">
                    <h4 class="modal-title" id="editModalLabel{{ $item->id }}">編集</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ route('items.update', ['type' => $type, 'itemId' => $item->id]) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        {{-- モーダルの中身は、form.modalであり、中身を読み込み --}}
                        @include('partials.form_modal')
                    </div>
                    {{-- フッター --}}
                    <div class="modal-footer">
                        {{-- 更新ボタン --}}
                        <button type="submit" class="btn btn-update"><i class="fas fa-check"></i></button>
                    </form>
                    {{-- 削除ボタン --}}
                        <button type="button" class="btn btn-dangers" data-toggle="modal" data-target="#deleteModal{{ $item->id }}"><i class="fa fa-trash-alt"></i></button>
                        {{-- 削除モーダル読み込み --}}
                        @include('partials.delete_modal', ['id' => $item->id])
                        {{-- 閉じるボタン --}}
                        <button type="button" class="btn btn-defaults" data-dismiss="modal"><i class="fa fa-undo-alt"></i></button>
                    </div>                
            </div>
        </div>
    </div>

