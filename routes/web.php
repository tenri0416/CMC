<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComponentTestController;
use App\Http\Controllers\LifeCycleTestController;
use App\Http\Controllers\User\MemoController;
use App\Http\Controllers\User\DirectoryController;


/*

|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('user.welcome');
});
// Route::get('/', function () {
//     return view('index
//     ');
// });
//ディレクトリー
Route::resource('directory', DirectoryController::class)
    ->middleware(['auth:users']); //exceptは以外という意味 showメゾットを外す

//メモ


Route::prefix('memo')->middleware('auth:users')->group(function () {
Route::get('index/{memo}',[MemoController::class,'index'])->name('memo.index');

Route::get('create/{memo}',[MemoController::class,'create'])->name('memo.create');

Route::post('store/{memo}',[MemoController::class,'store'])->name('memo.store');
Route::put('update/{memo}',[MemoController::class,'update'])->name('memo.update');

Route::get('open/{memo}', [MemoController::class, 'open'])->name('memo.open');

});
// Route::resource('memo', MemoController::class)
//     ->middleware(['auth:users']); //exceptは以外という意味 showメゾットを外す


//     ->middleware(['auth:users']); //exceptは以外という意味 showメゾットを外す


Route::prefix('expired-users')->middleware('auth:users')->group(function () {
    Route::get('memo/{memo}', [MemoController::class, 'open'])->name('expired-users.show');
     Route::get('store/{memo}', [MemoController::class, 'file_store'])->name('expired-users.store');
    // Route::post('destroy/{owner}', [MemoController::class, 'expiredOwnerDestroy'])
    //     ->name('expired-owners.destroy');
});

Route::get('/dashboard', function () {
    return view('user.dashboard');
})->middleware(['auth:users', 'verified'])->name('dashboard');

Route::get('/component-test1', [ComponentTestController::class, 'showComponent1']);
Route::get('/component-test2', [ComponentTestController::class, 'showComponent2']);


Route::get('/servucecontainertest', [LifeCycleTestController::class, 'showServiceContainerTest']);
Route::get('/serviceprovidertest', [LifeCycleTestController::class, 'showServiceProviderTest']);


Route::middleware('auth:users')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
