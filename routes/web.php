<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeStartupItemController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
| These routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// マイホームNOTEの表示
Route::prefix('/home')->middleware('auth')->group(function () {
    Route::get('', [HomeController::class, 'index'])->name('home.index');
});

// 認証ルート
Auth::routes();
Route::get('logout', [loginController::class, 'logout'])->name('logout');

// クライアント関連のルート
Route::prefix('client')->middleware('auth')->group(function () {
    Route::get('index', [ClientController::class, 'index'])->name('clients.index');
    Route::get('create', [ClientController::class, 'create'])->name('clients.create');
    Route::post('store', [ClientController::class, 'store'])->name('clients.store');
    Route::put('update', [ClientController::class, 'update'])->name('clients.update');
});

// アイテムの種類に基づいたルート設定
Route::prefix('HomePlanning')->middleware('auth')->group(function () {
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
Route::prefix('homeStartupItem')->middleware('auth')->group(function () {
    Route::get('/', [HomeStartupItemController::class, 'index'])->name('homeStartupItems.index');
    Route::post('/', [HomeStartupItemController::class, 'store'])->name('homeStartupItems.store');
    Route::put('/{homeStartupItemId}', [HomeStartupItemController::class, 'update'])->name('homeStartupItems.update');
    Route::get('/{homeStartupItemId}/edit', [HomeStartupItemController::class, 'edit'])->name('homeStartupItems.edit');
    Route::delete('/{homeStartupItemId}', [HomeStartupItemController::class, 'destroy'])->name('homeStartupItems.destroy');
    Route::delete('/{homeStartupItemId}/image', [HomeStartupItemController::class, 'deleteImage'])->name('homeStartupItems.deleteImage');
});

// ギャラリー関連のルート
Route::prefix('gallery')->middleware('auth')->group(function () {
    Route::get('/', [GalleryController::class, 'index'])->name('galleries.index');
    Route::post('/upload', [GalleryController::class, 'store'])->name('galleries.store');
    Route::delete('/{galleryId}', [GalleryController::class, 'destroy'])->name('galleries.destroy');
});

// 管理者用のルート
Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/', [AdminController::class, 'home'])->name('admin.home'); 
    Route::get('/users', [AdminController::class, 'indexUsers'])->name('admin.users.index');
    Route::delete('/users/{userId}', [AdminController::class, 'destroyUser'])->name('admin.users.destroy');
    Route::get('/clients', [AdminController::class, 'indexClients'])->name('admin.clients.index');
    Route::delete('/clients/{clientId}', [AdminController::class, 'destroyClient'])->name('admin.clients.destroy');
    Route::get('/items', [AdminController::class, 'indexItems'])->name('admin.items.index');
    Route::delete('/items/{itemId}', [AdminController::class, 'destroyItem'])->name('admin.items.destroy');
    Route::get('/homeStartupItems', [AdminController::class, 'indexHomeStartupItems'])->name('admin.homeStartupItems.index');
    Route::delete('/homeStartupItems/{homeStartupItemId}', [AdminController::class, 'destroyHomeStartupItem'])->name('admin.homeStartupItems.destroy');
    Route::get('/galleries', [AdminController::class, 'indexGalleries'])->name('admin.galleries.index');
    Route::delete('/galleries/{gallery}', [AdminController::class, 'destroyGallery'])->name('admin.galleries.destroy');
});

