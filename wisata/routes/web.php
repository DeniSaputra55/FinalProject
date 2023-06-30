<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\WisataController;
use App\Http\Controllers\UlasanController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\PenginapanController;
use App\Http\Controllers\RatingsController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ReviewWisataController;
use App\Http\Controllers\TentangController;
use App\Http\Controllers\TripsController;
use App\Http\Controllers\UserController;


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


// landing page
// Route::get('/', function () {
//     return view('index');
// });
//landing page
Route::get('/', function () {
    return view('front');
});
Route::get('/front', [FrontController::class, 'index']);
Route::get('/tentang', [TentangController::class, 'index']);
Route::get('/trips', [TripsController::class, 'index']);
Route::get('/trips/{id}', [TripsController::class, 'detail']);
Route::get('/review', [ReviewController::class, 'index']);
Route::post('/review/store', [ReviewController::class, 'store']);
Route::get('/penginapan', [PenginapanController::class, 'index_front']);
Route::get('/penginapan/{id}', [PenginapanController::class, 'detail']);
Route::get('/reviewwisata', [ReviewWisataController::class, 'index']);
Route::post('/reviewwisata/store', [ReviewWisataController::class, 'store']);

Route::prefix('pengunjung')->name('pengunjung.')->group(function() {
    // Auth page pengunjung
    Route::get('/auth/login', [AuthController::class, 'showLoginPengunjung']);
    Route::get('/auth/register', [AuthController::class, 'showRegisterPengunjung']);
    Route::post('/auth/login', [AuthController::class, 'loginPengunjung']);
    Route::post('/auth/register', [AuthController::class, 'registerPengunjung']);
    Route::get('/auth/logout', [AuthController::class, 'logoutPengunjung']);
    // routes/web.php

    // Route::get('pengunjung/auth/logout', [AuthController::class, 'logoutPengunjung'])->name('pengunjung.logout');

    // Middleware pengunjung
    Route::group(['middleware' => ['login_pengunjung']], function(){
        
    });
});


Route::prefix('admin')->name('admin.')->group(function(){
    // Auth page Admin
    Route::get('/auth/login', [AuthController::class, 'showLogin']);
    Route::get('/auth/register', [AuthController::class, 'showRegister']);
    Route::post('/auth/login', [AuthController::class, 'login']);
    Route::post('/auth/register', [AuthController::class, 'register']);
    Route::get('/auth/logout', [AuthController::class, 'logout']);

    // Middleware admin
    Route::group(['middleware' => ['login_admin']], function(){
        Route::get('dashboard',[DashboardController::class, 'index'])->name('index');

        Route::get('/wisata', [WisataController::class, 'index' ]);
        Route::get('/wisata/create', [WisataController::class, 'create']);
        Route::post('/wisata/store', [WisataController::class, 'store']);
        Route::get('/wisata/edit/{id}', [WisataController::class, 'edit']);
        Route::post('/wisata/update', [WisataController::class, 'update']);
        Route::get('/wisata/show/{id}', [WisataController::class, 'show']);
        Route::get('/wisata/delete/{id}', [WisataController::class, 'destroy']);
        Route::get('/wisata/export-wisata-pdf', [WisataController::class, 'exportPDF'])->name('export_wisata.pdf');

        Route::get('/penginapan', [PenginapanController::class, 'index' ]);
        Route::get('/penginapan/create', [PenginapanController::class, 'create']);
        Route::post('/penginapan/store', [PenginapanController::class, 'store']);
        Route::get('/penginapan/edit/{id}', [PenginapanController::class, 'edit']);
        Route::post('/penginapan/update', [PenginapanController::class, 'update']);
        Route::get('/penginapan/show/{id}', [PenginapanController::class, 'show']);
        Route::get('/penginapan/delete/{id}', [PenginapanController::class, 'destroy']);
        Route::get('/penginapan/export-penginapan-pdf', [PenginapanController::class, 'exportPDF'])->name('export_penginapan.pdf');

        Route::get('/review', [ReviewController::class, 'index_admin']);
        Route::get('/review/delete/{id}', [ReviewController::class, 'destroy']);
        Route::get('/review/export-review-pdf', [ReviewController::class, 'exportPDF'])->name('export_review.pdf');

        Route::get('/reviewwisata', [ReviewWisataController::class, 'index_admin']);
        Route::get('/reviewwisata/delete/{id}', [ReviewWisataController::class, 'destroy']);
        Route::get('/reviewwisata/export-reviewwisata-pdf', [ReviewWisataController::class, 'exportPDF'])->name('export_reviewwisata.pdf');


        Route::get('/ulasan', [UlasanController::class, 'index']);
        Route::get('ulasan/create', [UlasanController::class, 'create']);
        Route::post('/ulasan/store', [UlasanController::class, 'store']);
        Route::get('/ulasan/edit/{id}', [UlasanController::class,'edit']);
        Route::post('/ulasan/update', [UlasanController::class, 'update']);
        Route::get('/ulasan/show/{id}', [UlasanController::class, 'show']);
        Route::get('/ulasan/delete/{id}', [UlasanController::class,'destroy']);
        Route::get('/ulasan/export-ulasan-pdf', [UlasanController::class, 'exportPDF'])->name('export_ulasan.pdf');

        Route::get('/rating', [RatingController::class, 'index']);
        Route::get('rating/create', [RatingController::class, 'create']);
        Route::post('/rating/store', [RatingController::class, 'store']);
        Route::get('/rating/edit/{id}', [RatingController::class,'edit']);
        Route::post('/rating/update', [RatingController::class, 'update']);
        Route::get('/rating/show/{id}', [RatingController::class, 'show']);
        Route::get('/rating/delete/{id}', [RatingController::class,'destroy']);
        Route::get('/rating/export-rating-pdf', [RatingController::class, 'exportPDF'])->name('export_rating.pdf');

        Route::get('/user', [UserController::class, 'index']);
    });
});