<?php

use App\Http\Controllers\ActionController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\PartnerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\BBP_EmployerController;
use App\Http\Controllers\StrategyController;



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
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [\App\Http\Controllers\ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit', [\App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [\App\Http\Controllers\ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/customers', [\App\Http\Controllers\CustomerController::class, 'index'])->name('customers.index');
    Route::get('/customers/create', [\App\Http\Controllers\CustomerController::class, 'create'])->name('customers.create');
    Route::get('/customers/{customer}/edit', [\App\Http\Controllers\CustomerController::class, 'edit'])->name('customers.edit');
    Route::put('/customers/{customer}/update', [\App\Http\Controllers\CustomerController::class, 'update'])->name('customers.update');
    Route::post('/customers', [\App\Http\Controllers\CustomerController::class, 'store'])->name('customers.store');
    Route::delete('/customers/{customer}', [\App\Http\Controllers\CustomerController::class, 'destroy'])->name('customers.destroy');
    Route::get('/customers/{customer}', [\App\Http\Controllers\CustomerController::class, 'show'])->name('customers.show');
    Route::get('/customers/{customer}/strategy', [\App\Http\Controllers\CustomerController::class, 'showStrategy'])->name('customers.strategy');
    Route::post('/customers/{customer}/strategy', [\App\Http\Controllers\CustomerController::class, 'storeStrategy'])->name('customers.strategy.store');
    Route::get('/customers/{customer}/actions', [\App\Http\Controllers\CustomerController::class, 'showActions'])->name('customers.actions');
    Route::get('customers/{customer}/notes', [\App\Http\Controllers\CustomerController::class, 'notes'])->name('customers.notes');
    Route::put('customers/{customer}/notes', [\App\Http\Controllers\CustomerController::class, 'updateNotes'])->name('customers.updateNotes');
});

Route::middleware('auth')->group(function () {
    Route::get('/users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [\App\Http\Controllers\UserController::class, 'create'])->name('users.create');
    Route::get('/users/{user}/edit', [\App\Http\Controllers\UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}/update', [\App\Http\Controllers\UserController::class, 'update'])->name('users.update');
    Route::post('/users', [\App\Http\Controllers\UserController::class, 'store'])->name('users.store');
    Route::delete('/users/{user}', [\App\Http\Controllers\UserController::class, 'destroy'])->name('users.destroy');
});


Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/parents', [AdminController::class, 'index'])->name('admin.parents.index');
    Route::get('/admin/parents/add', [AdminController::class, 'showAddParentForm'])->name('admin.showAddParentForm');
    Route::post('/admin/parents', [AdminController::class, 'storeParent'])->name('admin.storeParent');
    Route::post('/admin/users/{user}/send-password-reset', [AdminController::class, 'sendPasswordReset'])->name('admin.users.send-password-reset');
});



Route::middleware('auth')->group(function () {
    Route::get('/actions', [\App\Http\Controllers\ActionController::class, 'index'])->name('actions.index');
    Route::get('/actions/create', [\App\Http\Controllers\ActionController::class, 'create'])->name('actions.create');
    Route::post('/actions', [\App\Http\Controllers\ActionController::class, 'store'])->name('actions.store');
    Route::get('/actions/{action}/edit', [\App\Http\Controllers\ActionController::class, 'edit'])->name('actions.edit');
    Route::patch('/actions/{action}', [\App\Http\Controllers\ActionController::class, 'update'])->name('actions.update');
    Route::delete('/actions/{action}', [\App\Http\Controllers\ActionController::class, 'destroy'])->name('actions.destroy');
});


Route::middleware('auth')->group(function () {
    Route::resource('contracts', ContractController::class);
    Route::get('contracts/{contract}/pdf', [ContractController::class, 'convertToPDF'])->name('contracts.pdf');
});

Route::middleware('auth')->group(function () {
    Route::resource('contacts', ContactController::class);
});

Route::middleware('auth')->group(function () {
Route::resource('bbp_employers', BBP_EmployerController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/strategies', [\App\Http\Controllers\StrategyController::class, 'index'])->name('strategies.index');
    Route::get('/strategies/create', [\App\Http\Controllers\StrategyController::class, 'create'])->name('strategies.create');
    Route::get('/strategies/{strategy}/edit', [\App\Http\Controllers\StrategyController::class, 'edit'])->name('strategies.edit');
    Route::patch('/strategies/{strategy}/update', [\App\Http\Controllers\StrategyController::class, 'update'])->name('strategies.update');
    Route::post('/strategies', [\App\Http\Controllers\StrategyController::class, 'store'])->name('strategies.store');
    Route::delete('/strategies/{strategy}', [\App\Http\Controllers\StrategyController::class, 'destroy'])->name('strategies.destroy');
});


Route::middleware('auth')->group(function () {
    Route::resource('parents', ParentController::class);
});

Route::middleware('auth')->group(function () {
    Route::resource('partners', PartnerController::class);
});

Route::middleware('auth')->group(function () {
    Route::resource('categories', CategoryController::class);
});



require __DIR__.'/auth.php';
