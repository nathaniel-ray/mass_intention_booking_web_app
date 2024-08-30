<?php


use App\Http\Controllers\AdminIntentionController;
use App\Http\Controllers\AdminIntentionDetails;
use App\Http\Controllers\AdminSettingsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\IntentionController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\NotificationSeenController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserAccountController;
use App\Http\Controllers\UserIntentionController;
use App\Http\Controllers\UserProfileImageController;
use Illuminate\Support\Facades\Route;
use Pest\Plugins\Only;

// Route::get('/', function () {
//     return inertia('Index/Index');
// });
Route::get('/', [IndexController::class, 'index'])->name('intention.home');
Route::get('/hello', [IndexController::class, 'show']);

Route::resource('intention', IntentionController::class)->only('create', 'store', 'destroy', 'edit', 'update')->middleware('auth');
Route::get('/register', [UserAccountController::class, 'create'])->name('register');
Route::post('/register', [UserAccountController::class, 'store'])->name('register.store');


Route::get('login', [AuthController::class, 'create'])->name('login');
Route::post('login', [AuthController::class, 'store'])->name('login.store');
Route::delete('logout', [AuthController::class, 'destroy'])->name('logout');

Route::prefix('user')
    ->name('user.')
    ->middleware('auth')
    ->group(function () {
        Route::resource('account', UserIntentionController::class)
            ->only('index', 'destroy', 'update', 'edit');
        Route::resource('user.image', UserProfileImageController::class)->only(['create', 'store', 'destroy']);
    });



Route::prefix('admin')
    ->name('admin.')
    ->middleware('is-admin')
    ->group(function () {
        Route::resource('user', AdminIntentionController::class);
        Route::resource('notification', NotificationController::class)->only('index');
        Route::get('/search', [SearchController::class, 'search'])->name('search');
        Route::put('notification/{notification}/seen', NotificationSeenController::class)->name('notification.seen');
        Route::get('index2', [AdminIntentionController::class, 'index2'])->name('index2');
        Route::get('intentions', [AdminIntentionController::class, 'intentionDets'])->name('intentions');
        Route::get('settings', [AdminSettingsController::class, 'settings'])->name('settings');
        Route::put('settings/update/{user}', [AdminSettingsController::class, 'updateUser'])->name('settings.update');
        Route::get('superadmin', [AdminSettingsController::class, 'superAdmin'])->name('superadmin');
        Route::post('user/make-admin', [AdminSettingsController::class, 'makeAdmin'])->name('user.make-admin');
        Route::post('user/remove-admin', [AdminSettingsController::class, 'removeAdmin'])->name('user.remove-admin');
    });

Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::patch('/users/{user}/make-admin', [AdminSettingsController::class, 'makeAdmin'])->name('users.makeAdmin');
});

Route::prefix('admin')
    ->name('admin.')
    ->middleware(['is-admin'])
    ->group(
        function () {
            Route::resource('intention', AdminIntentionDetails::class)->except('create', 'store');
        }
    );
