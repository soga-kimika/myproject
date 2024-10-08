            <?php

            use Illuminate\Support\Facades\Route;
            use App\Http\Controllers\HomeController;
            use App\Http\Controllers\ClientController;
            use App\Http\Controllers\ItemController;
            use App\Http\Controllers\GalleryController;
            use App\Http\Controllers\HomeStartupItemController;

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

            Route::prefix('HomePlanning')->group(function () {  
            // アイテムの種類に基づいたルート設定
            Route::prefix('{type}')->group(function () {
                Route::get('/', [ItemController::class, 'index'])->name('items.index');
                Route::post('/', [ItemController::class, 'store'])->name('items.store');
                Route::put('/{itemId}', [ItemController::class, 'update'])->name('items.update');
                Route::delete('/{itemId}', [ItemController::class, 'destroy'])->name('items.destroy');
                Route::get('/{cardTitle}', [ItemController::class, 'showItemsByTitle'])->name('items.showByTitle');
                Route::delete('/{itemId}/image', [ItemController::class, 'deleteImage'])->name('items.deleteImage');
            }); 
         });      

            // ホームスタートアップ関連のルート
            Route::prefix('homeStartupItem')->group(function () {
                Route::get('/', [HomeStartupItemController::class, 'index'])->name('homeStartupItems.index');
                Route::post('/', [HomeStartupItemController::class, 'store'])->name('homeStartupItems.store');
                Route::put('/{homeStartupItemId}', [HomeStartupItemController::class, 'update'])->name('homeStartupItems.update');
                Route::get('/{homeStartupItemId}/edit', [HomeStartupItemController::class, 'edit'])->name('homeStartupItems.edit');
                Route::delete('/{homeStartupItemId}', [HomeStartupItemController::class, 'destroy'])->name('homeStartupItems.destroy');
                Route::delete('/{homeStartupItemId}/image', [HomeStartupItemController::class, 'deleteImage'])->name('homeStartupItems.deleteImage');

            });

            // ギャラリー関連のルート
            Route::prefix('gallery')->group(function () {
                Route::get('/', [GalleryController::class, 'index'])->name('galleries.index');
                Route::post('/upload', [GalleryController::class, 'store'])->name('galleries.store');
                Route::delete('/{galleryId}', [GalleryController::class, 'destroy'])->name('galleries.destroy');
            });
