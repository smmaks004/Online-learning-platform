<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\SearchController;

use App\Http\Middleware\AuthenticationCheck;
use App\Http\Middleware\AuthenticationMainCheck;


use App\Http\Middleware\SetLocale;

Route::get('/', function () {
    return view('welcome');
});


Route::redirect('/', '/home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/login', [AuthenticatedSessionController::class, 'create'])
                ->middleware('guest')
                ->name('login');

Route::post('/login', [AuthenticatedSessionController::class, 'store'])
                ->middleware('guest');

Route::get('/register', [RegisteredUserController::class, 'create'])
                ->middleware('guest')
                ->name('register');

Route::post('/register', [RegisteredUserController::class, 'store'])
                ->middleware('guest');

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
                ->middleware('auth')
                ->name('logout');

    

require __DIR__.'/auth.php';


Route::get('/locale/{locale}', [HomeController::class, 'changeLocale'])->name('locale');


Route::middleware([SetLocale::class])->group(function(){

    /********************************************************/
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    /********************************************************/



    /********************************************************/
    Route::get('/account', [UserController::class, 'index'])->name('account.index')->middleware(AuthenticationCheck::class);
    Route::put('/account/{id}', [UserController::class, 'update'])->name('account.update');
    Route::post('/account', [UserController::class, 'redirect'])->name('account.redirect');

    /********************************************************/

    Route::patch('/account/{id}', [RoleController::class, 'update'])->name('account.update');

    Route::get('/account/deleteUser/{id}', [UserController::class, 'deleteUser'])->name('deleteUser');
    Route::get('/account/deletePost/{id}', [UserController::class, 'deletePost'])->name('deletePost');
    Route::patch('/account/EditLesson/{id}', [UserController::class, 'editLesson'])->name('editLesson');


    Route::post('/account/CreateLesson/{id}', [UserController::class, 'createLesson'])->name('createLesson');

    // Role Moment
    Route::get('/account', [UserController::class, 'index'])->name('account.index')->middleware(AuthenticationCheck::class);

    // Route to main site page
    Route::post('/main', [MainController::class, 'index'])->name('main.index')->middleware(AuthenticationMainCheck::class); 
    Route::get('/main', [MainController::class, 'update'])->name('main.update')->middleware(AuthenticationMainCheck::class); 



});


