<?php

use App\Models\Home;
use App\Models\User;
use App\Models\Kategori;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DetailKController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KategoriController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {

    $user = User::find(Auth::user()->id);
    return view('dashboard', [
        'home' => $user->home()->with('user')->get(),
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::match(['get', 'post'], '/home', [HomeController::class, 'index', 'store'])->middleware(['auth', 'verified'])->name(['home']);;

Route::resource('home', HomeController::class);
Route::resource('kategori', KategoriController::class);
// Route::get('detail_kategori', function () {
//     return view('detail_kategori');
// });

require __DIR__ . '/auth.php';
