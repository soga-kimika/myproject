        {{-- ホームスタートアップ編集モーダル --}}
        <div class="modal fade" id="homeStartupItem-editModal{{ $homeStartupItem->id }}" tabindex="-1" role="dialog" aria-labelledby="homeStartupItem-editModalLabel{{ $homeStartupItem->id }}" aria-hidden="true">
            <div class="modal-dialog  homeStartupItem-editmodal-dialog modal-lg">
                <div class="modal-content">
                    {{-- モーダルヘッダー --}}
                    <div class="modal-header">
                        <h4 class="modal-title" id="homeStartupItem-editModalLabel{{ $homeStartupItem->id }}">編集</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="{{ route('homeStartupItems.update', ['homeStartupItemId' => $homeStartupItem->id]) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            {{-- モーダルの中身は、form.modalであり、中身を読み込み --}}
                            @include('partials.home_startup.form_modal')
                        </div>
                    </form>  
                        {{-- フッター --}}
                        <div class="modal-footer">
                        {{-- 削除ボタン --}}
                            <button type="button" class="btn btn-dangers" data-toggle="modal" data-target="#homeStartupItem-deleteModal{{ $homeStartupItem->id }}"><i class="fa fa-trash-alt"></i></button>
                            {{-- 削除モーダル読み込み --}}
                            @include('partials.home_startup.delete_modal', ['id' => $homeStartupItem->id])
                            {{-- 閉じるボタン --}}
                            <button type="button" class="btn btn-defaults" data-dismiss="modal"><i class="fa fa-undo-alt"></i></button>
                        </div>  
                </div>
            </div>
        </div>

