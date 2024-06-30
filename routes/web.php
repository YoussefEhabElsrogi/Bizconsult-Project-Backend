<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\TestmonialController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

// FRONT ROUTS
Route::name('front.')->controller(FrontController::class)->group(function () {
    // =================================== HOME PAGE
    Route::post('/subscriber/store', 'subscriberStore')->name('subscriber.store');
    Route::get('/', 'index')->name('index');

    // =================================== ABOUT PAGE
    Route::get('/about', 'about')->name('about');

    // =================================== SERVICE PAGE
    Route::get('/service', 'service')->name('service');

    // =================================== CONTACT PAGE
    Route::get('/contact', 'contact')->name('contact');
    Route::post('/contact/store', 'contactStore')->name('contact.store');
});

// ADMIN ROUTS
Route::name('admin.')->prefix(LaravelLocalization::setLocale() . '/admin')->middleware(
    ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
)->group(function () {
    Route::middleware('auth')->group(function () {
        // =================================== HOME PAGE
        Route::view('/', 'admin.index')->name('index');

        // =================================== SERVICES
        Route::controller(ServiceController::class)->group(function () {
            Route::resource('services', ServiceController::class);
        });

        // =================================== FEATURES
        Route::controller(FeatureController::class)->group(function () {
            Route::resource('features', FeatureController::class);
        });

        // =================================== MESSAGES
        Route::controller(MessageController::class)->group(function () {
            Route::resource('messages', MessageController::class)->only(['index', 'show', 'destroy']);
        });

        // =================================== SUBSCRIBERS
        Route::controller(SubscriberController::class)->group(function () {
            Route::resource('subscribers', SubscriberController::class)->only(['index', 'destroy']);
        });

        // =================================== TESTMONIALS
        Route::controller(TestmonialController::class)->group(function () {
            Route::resource('testmonials', TestmonialController::class);
        });

        // =================================== COMPANIES
        Route::controller(CompanyController::class)->group(function () {
            Route::resource('companies', CompanyController::class)->except('show');
        });

        // =================================== MEMBERS
        Route::controller(MemberController::class)->group(function () {
            Route::resource('members', MemberController::class);
        });

        // =================================== SETTING
        Route::controller(SettingController::class)->group(function () {
            Route::resource('settings', SettingController::class)->only('index', 'update');
        });
    });
    require __DIR__ . '/auth.php';
});
