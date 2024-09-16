<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomePlanningController;



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

// Route::get('/', function () {
//     return view('welcome');
// });



use App\Http\Controllers\ClientController;

Route::prefix('client')->group(function () {
     // 施主情報画面表示
    Route::get('index', [ClientController::class, 'index'])->name('client.index');
     // 施主情報登録
     Route::post('store',[ClientController::class, 'store'])->name('client.store');
    //  施主情報編集編集画面表示
    Route::get('edit', [ClientController::class, 'edit'])->name('client.edit');
    // 施主情報更新
    Route::put('update', [ClientController::class, 'update'])->name('client.update');
    // 施主情報削除
    Route::delete('destroy', [ClientController::class, 'destroy'])->name('client.destroy');
    // 施主情報登録画面表示
    Route::get('create', [ClientController::class, 'create'])->name('client.create');
});
   

use App\Http\Controllers\ItemController;




Route::prefix('HomePlanning')->group(function () {
// リソースの種類に基づいたルート設定
Route::prefix('{type}')->group(function () {
    // 一覧表示（GET）
    Route::get('/', [ItemController::class, 'show'])->name('items.show');

    // 新規作成（POST）
    Route::post('/', [ItemController::class, 'store'])->name('items.store');

    // 更新（PUT）
    Route::put('/{itemId}', [ItemController::class, 'update'])->name('items.update');
    
    // 削除
    Route::delete('/{itemId}',[ItemController::class,'destroy'])->name('items.destroy');

    
});

// web.php

Route::get('/items/{type}/{cardTitle}', [YourController::class, 'showItemsByTitle'])->name('items.showByTitle');


});

