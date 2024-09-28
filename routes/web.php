        <?php

        use Illuminate\Support\Facades\Route;
        use App\Http\Controllers\HomeController;
        use App\Http\Controllers\ClientController;
        use App\Http\Controllers\ItemController;
        use App\Http\Controllers\GalleryController;


        /*
        |--------------------------------------------------------------------------
        | Web Routes
        |--------------------------------------------------------------------------
        |
        | Here is where you can register web routes for your application. These
        | routes are loaded by the RouteServiceProvider and all of them will
        | be assigned to the "web" middleware group. Make something great!
        |
        */



        Route::prefix('/home')->group(function () {
            // ダッシュボード表示
            Route::get('', [HomeController::class, 'index'])->name('home.index');
            // プロフィール登録画面遷移
            Route::get('show', [HomeController::class, 'show'])->name('home.show');
        });

        Auth::routes();
        Route::prefix('client')->group(function () {
            // 施主情報画面表示
            Route::get('index', [ClientController::class, 'index'])->name('client.index');
            // 施主情報「登録」画面表示
            Route::get('create', [ClientController::class, 'create'])->name('client.create');
            // 施主情報登録
            Route::post('store', [ClientController::class, 'store'])->name('client.store');
            // 施主情報「編集」画面表示
            Route::get('edit', [ClientController::class, 'edit'])->name('client.edit');
            // 施主情報更新
            Route::put('update', [ClientController::class, 'update'])->name('client.update');
            // 施主情報削除
            Route::delete('destroy', [ClientController::class, 'destroy'])->name('client.destroy');
        });

        Route::prefix('HomePlanning')->group(function () {
            // リソースの種類に基づいたルート設定
            Route::prefix('{type}')->group(function () {
                // 一覧表示（GET）
                Route::get('/', [ItemController::class, 'index'])->name('items.index');
                // 新規作成（POST）
                Route::post('/', [ItemController::class, 'store'])->name('items.store');
                // 更新（PUT）
                Route::put('/{itemId}', [ItemController::class, 'update'])->name('items.update');
                // 削除
                Route::delete('/{itemId}', [ItemController::class, 'destroy'])->name('items.destroy');
                Route::get('/{cardTitle}', [ItemController::class, 'showItemsByTitle'])->name('items.showByTitle');
                // 画像削除
                Route::post('/{itemId}/image', [ItemController::class, 'deleteImage'])->name('items.deleteImage');
            });
        });        

        Route::prefix('gallery')->group(function () {
            // ギャラリーページ一覧表示
            Route::get('/', [GalleryController::class, 'index'])->name('galleries.index');
            // 画像登録
            Route::post('/upload', [GalleryController::class, 'store'])->name('galleries.store');
            // 画像削除
            Route::delete('/{photoId}', [GalleryController::class, 'destroy'])->name('galleries.destroy');
        });

