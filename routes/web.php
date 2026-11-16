<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ServiceOrderController;
use App\Http\Controllers\TechnicianController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CustomerDashboardController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\Admin\CustomerController as AdminCustomerController;
use App\Http\Controllers\Admin\WarrantyController as AdminWarrantyController;

// ─── Public Landing Pages ────────────────────────────────────────────────────
Route::get('/', function () {
    $page = \App\Models\LandingPage::with('sections')->where('slug', 'home')->first();
    return view('home', compact('page'));
});
Route::get('/lapcom', function () { return view('lapcom'); });
Route::get('/servmaintenance', function () {
    $page = \App\Models\LandingPage::with('sections')->where('slug', 'servmaintenance')->first();
    return view('servmaintenance', compact('page'));
});
Route::get('/about', function () {
    $page = \App\Models\LandingPage::with('sections')->where('slug', 'about')->first();
    return view('about', compact('page'));
});
Route::get('/help', function () {
    $page = \App\Models\LandingPage::with('sections')->where('slug', 'help')->first();
    return view('help', compact('page'));
});
Route::get('/contact', function () {
    $page = \App\Models\LandingPage::with('sections')->where('slug', 'contact')->first();
    return view('contact', compact('page'));
});

Route::get('/pcperipheral', [ProductController::class, 'showPcPeripherals'])->name('pcperipheral');
Route::get('/product-detail/{id}', [ProductController::class, 'showProductDetail'])->name('product.detail');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Public Service Tracking
Route::get('/servicestatus', function () { return view('servicestatus'); });
Route::post('/servicestatus', [ServiceOrderController::class, 'checkStatus']);

// ─── Notifications (All Authenticated Users) ─────────────────────────────────
Route::middleware(['auth'])->prefix('notifications')->name('notifications.')->group(function () {
    Route::get('/', [NotificationController::class, 'index'])->name('index');
    Route::post('/{id}/read', [NotificationController::class, 'markRead'])->name('read');
    Route::post('/read-all', [NotificationController::class, 'markAllRead'])->name('read-all');
});

// ─── Customer Portal (Role: Pelanggan) ───────────────────────────────────────
Route::middleware(['auth', 'pelanggan'])->prefix('customer')->name('customer.')->group(function () {
    Route::get('/dashboard', [CustomerDashboardController::class, 'index'])->name('dashboard');
    Route::get('/service-history', [CustomerDashboardController::class, 'serviceHistory'])->name('service-history');
    Route::get('/service-detail/{id}', [CustomerDashboardController::class, 'serviceDetail'])->name('service-detail');
    Route::get('/warranty', [CustomerDashboardController::class, 'warrantyIndex'])->name('warranty.index');
    Route::get('/warranty/create/{serviceOrderId}', [CustomerDashboardController::class, 'warrantyCreate'])->name('warranty.create');
    Route::post('/warranty', [CustomerDashboardController::class, 'warrantyStore'])->name('warranty.store');
    Route::get('/profile', [CustomerDashboardController::class, 'profile'])->name('profile');
    Route::post('/profile', [CustomerDashboardController::class, 'updateProfile'])->name('profile.update');
});

// ─── Staff Portal (Role: Admin & Teknisi) ────────────────────────────────────
Route::middleware(['auth', 'staff'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Quick status update (instant transition with SweetAlert confirm)
    Route::post('service-orders/{serviceOrder}/update-status', [ServiceOrderController::class, 'updateStatus'])
        ->name('service-orders.update-status');

    Route::resource('service-orders', ServiceOrderController::class);
    Route::get('service-orders-report', [ServiceOrderController::class, 'report'])->name('service-orders.report');
    Route::get('service-orders-print', [ServiceOrderController::class, 'printReport'])->name('service-orders.print');
    Route::get('/service-orders/customer/{customer}/history', [ServiceOrderController::class, 'customerHistory'])
        ->name('service-orders.customer-history');
});

// ─── Admin Portal (Role: Admin Only) ─────────────────────────────────────────
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/profile', [AuthController::class, 'showProfileForm'])->name('profile');
    Route::post('/update-profile', [AuthController::class, 'updateProfile'])->name('update-profile');
    Route::post('/change-password', [AuthController::class, 'changePassword'])->name('change-password');

    Route::resource('admin/products', ProductController::class, ['as' => 'admin']);
    Route::get('admin/products-report', [ProductController::class, 'report'])->name('admin.products.report');
    Route::get('admin/products-print', [ProductController::class, 'print'])->name('admin.products.print');

    Route::resource('technicians', TechnicianController::class);

    // Kelola Pelanggan
    Route::get('admin/customers', [AdminCustomerController::class, 'index'])->name('admin.customers.index');
    Route::get('admin/customers/{id}', [AdminCustomerController::class, 'show'])->name('admin.customers.show');

    // Kelola Klaim Garansi
    Route::get('admin/warranty', [AdminWarrantyController::class, 'index'])->name('admin.warranty.index');
    Route::get('admin/warranty/{id}', [AdminWarrantyController::class, 'show'])->name('admin.warranty.show');
    Route::post('admin/warranty/{id}', [AdminWarrantyController::class, 'update'])->name('admin.warranty.update');

    // Kelola Landing Page (CMS)
    Route::get('admin/landing-pages', [\App\Http\Controllers\Admin\LandingPageController::class, 'index'])->name('admin.landing-pages.index');
    Route::get('admin/landing-pages/{landingPage:slug}/edit', [\App\Http\Controllers\Admin\LandingPageController::class, 'edit'])->name('admin.landing-pages.edit');
    Route::put('admin/landing-pages/{landingPage:slug}', [\App\Http\Controllers\Admin\LandingPageController::class, 'update'])->name('admin.landing-pages.update');
    Route::post('admin/landing-pages/{landingPage:slug}/reset', [\App\Http\Controllers\Admin\LandingPageController::class, 'reset'])->name('admin.landing-pages.reset');
});
