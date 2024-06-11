<?php
<<<<<<< HEAD

use App\Http\Controllers\AgendaController;
use App\Http\Controllers\HariController;
=======
>>>>>>> 76fcd5592d409d18cc03c06f7773dd48cf402fd9
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\LoginController; //leweh add user
use App\Http\Controllers\Admin\LoginController as AdminLoginController; //leweh add admin
use App\Http\Controllers\Admin\Prodi;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'account'], function(){
    //Guest middleware
    Route::group(['middleware' => 'guest'], function(){
        Route::get('login', [LoginController::class, 'index'])->name('account.login');
        Route::get('register', [LoginController::class, 'register'])->name('account.register');
        Route::post('process-register', [LoginController::class, 'processRegister'])->name('account.processRegister');
        Route::post('authenticate', [LoginController::class, 'authenticate'])->name('account.authenticate');
    });

<<<<<<< HEAD
Route::resource('agenda', AgendaController::class);
Route::resource('hari', HariController::class);
=======
    //Authenticate middleware
    Route::group(['middleware' => 'auth'], function(){
        Route::get('logout', [LoginController::class, 'logout'])->name('account.logout');
        Route::get('dashboard', [DashboardController::class, 'index'])->name('account.dashboard');

    });

});


//ADMIN
Route::group(['prefix' => 'admin'], function(){
    //diambil dari boostrap/app.php
    Route::group(['middleware' => 'admin.guest'], function(){
        Route::get('login', [AdminLoginController::class, 'index'])->name('admin.login');
        Route::post('authenticate', [AdminLoginController::class, 'authenticate'])->name('admin.authenticate');
    
    });

    Route::group(['middleware' => 'admin.auth'], function(){
        Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
        Route::get('logout', [AdminLoginController::class, 'logout'])->name('admin.logout');
    });

});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('home', [HomeController::class, 'index']);
>>>>>>> 76fcd5592d409d18cc03c06f7773dd48cf402fd9
