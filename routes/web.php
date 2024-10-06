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
            // マイホームNOTEの表示
            Route::get('', [HomeController::class, 'index'])->name('home.index');
    
        });

        Auth::routes();
        Route::prefix('client')->group(function () {
            // プロフィール画面表示
            Route::get('index', [ClientController::class, 'index'])->name('clients.index');
            // プロフィール「登録」画面表示
            Route::get('create', [ClientController::class, 'create'])->name('clients.create');
            // プロフィール登録
            Route::post('store', [ClientController::class, 'store'])->name('clients.store');
            // プロフィール更新
            Route::put('update', [ClientController::class, 'update'])->name('clients.update');
        });

        Route::prefix('HomePlanning')->group(function () {
            // リソースの種類に基づいたルート設定
            Route::prefix('{type}')->group(function () {
                // それぞれの画面表示
                Route::get('/', [ItemController::class, 'index'])->name('items.index');
                // 登録
                Route::post('/', [ItemController::class, 'store'])->name('items.store');
                // 更新
                Route::put('/{itemId}', [ItemController::class, 'update'])->name('items.update');
                // 削除
                Route::delete('/{itemId}', [ItemController::class, 'destroy'])->name('items.destroy');
                Route::get('/{cardTitle}', [ItemController::class, 'showItemsByTitle'])->name('items.showByTitle');
                // 画像のみ削除
                Route::post('/{itemId}/image', [ItemController::class, 'deleteImage'])->name('items.deleteImage');
            });
        });        

        Route::prefix('gallery')->group(function () {
            // ギャラリーページ一覧表示
            Route::get('/', [GalleryController::class, 'index'])->name('galleries.index');
            // 登録
            Route::post('/upload', [GalleryController::class, 'store'])->name('galleries.store');
            // 削除
            Route::delete('/{galleryId}', [GalleryController::class, 'destroy'])->name('galleries.destroy');
        });

