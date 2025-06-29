<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ServiceOrderController;
use App\Http\Controllers\TechnicianController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\ProductController;

Route::get('/', function () { return view('home'); });
Route::get('/lapcom', function () { return view('lapcom'); });
Route::get('/servmaintenance', function () { return view('servmaintenance'); });
Route::get('/about', function () { return view('about'); });
Route::get('/help', function () { return view('help'); });
Route::get('/contact', function () { return view('contact'); });

Route::get('/pcperipheral', [ProductController::class, 'showPcPeripherals'])->name('pcperipheral');

Route::get('/product-detail/{id}', [ProductController::class, 'showProductDetail'])->name('product.detail');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/servicestatus', function () { return view('servicestatus'); });
Route::post('/servicestatus', [ServiceOrderController::class, 'checkStatus']);

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        $pendingCount = 0;
        $processCount = 0;
        $completedCount = 0;
        $recentOrders = [];

        return view('dashboard', compact(
            'pendingCount', 
            'processCount', 
            'completedCount', 
            'recentOrders'
        ));
    })->name('dashboard');

    Route::middleware(['auth', AdminMiddleware::class])->group(function () {
        Route::get('/profile', [AuthController::class, 'showProfileForm'])->name('profile');
        Route::post('/update-profile', [AuthController::class, 'updateProfile'])->name('update-profile');
        Route::post('/change-password', [AuthController::class, 'changePassword'])->name('change-password');

        Route::resource('admin/products', ProductController::class, ['as' => 'admin']);

        Route::get('admin/products-report', [ProductController::class, 'report'])->name('admin.products.report');
        Route::get('admin/products-print', [ProductController::class, 'print'])->name('admin.products.print');
    });

    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

    Route::resource('service-orders', ServiceOrderController::class);
    Route::get('service-orders-report', [ServiceOrderController::class, 'report'])->name('service-orders.report');
    Route::get('service-orders-print', [ServiceOrderController::class, 'printReport'])->name('service-orders.print');

    Route::get('/service-orders/customer/{customer}/history', [ServiceOrderController::class, 'customerHistory'])
        ->name('service-orders.customer-history');

    Route::middleware([AdminMiddleware::class])->group(function () {
        Route::resource('technicians', TechnicianController::class);
    });
});