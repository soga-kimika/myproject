            <?php

            use Illuminate\Support\Facades\Route;
            use App\Http\Controllers\HomeController;
            use App\Http\Controllers\ClientController;
            use App\Http\Controllers\ItemController;
            use App\Http\Controllers\GalleryController;
            use App\Http\Controllers\HomeStartupController;

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

            // マイホームNOTEの表示
            Route::prefix('/home')->group(function () {
                Route::get('', [HomeController::class, 'index'])->name('home.index');
            });

            // 認証ルート
            Auth::routes();

            // クライアント関連のルート
            Route::prefix('client')->group(function () {
                Route::get('index', [ClientController::class, 'index'])->name('clients.index');
                Route::get('create', [ClientController::class, 'create'])->name('clients.create');
                Route::post('store', [ClientController::class, 'store'])->name('clients.store');
                Route::put('update', [ClientController::class, 'update'])->name('clients.update');
            });

            // アイテムの種類に基づいたルート設定
            Route::prefix('{type}')->group(function () {
                Route::get('/', [ItemController::class, 'index'])->name('items.index');
                Route::post('/', [ItemController::class, 'store'])->name('items.store');
                Route::put('/{itemId}', [ItemController::class, 'update'])->name('items.update');
                Route::delete('/{itemId}', [ItemController::class, 'destroy'])->name('items.destroy');
                Route::get('/{cardTitle}', [ItemController::class, 'showItemsByTitle'])->name('items.showByTitle');
                Route::post('/{itemId}/image', [ItemController::class, 'deleteImage'])->name('items.deleteImage');
            });

            // ホームスタートアップ関連のルート
            Route::prefix('homestartup')->group(function () {
                Route::get('/', [HomeStartupController::class, 'index'])->name('homeStartups.index');
                Route::post('/', [HomeStartupController::class, 'store'])->name('homeStartups.store');
                Route::put('/{homeStartupId}', [HomeStartupController::class, 'update'])->name('homeStartups.update');
                Route::delete('/{homeStartupId}', [HomeStartupController::class, 'destroy'])->name('homeStartups.destroy');
                Route::get('/{cardTitle}', [HomeStartupController::class, 'showItemsByTitle'])->name('homeStartups.showByTitle');
                Route::post('/{homeStartupId}/image', [HomeStartupController::class, 'deleteImage'])->name('homeStartups.deleteImage');
            });

            // ギャラリー関連のルート
            Route::prefix('gallery')->group(function () {
                Route::get('/', [GalleryController::class, 'index'])->name('galleries.index');
                Route::post('/upload', [GalleryController::class, 'store'])->name('galleries.store');
                Route::delete('/{galleryId}', [GalleryController::class, 'destroy'])->name('galleries.destroy');
            });
