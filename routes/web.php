<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\PropertyController;
use App\Http\Controllers\Backend\PropertyTypeController;
use App\Http\Controllers\Backend\PropertyCategoryController;
use App\Http\Controllers\Frontend\TenantController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Frontend\InvestorController;
use App\Http\Controllers\Frontend\SubscriberController;
use App\Http\Controllers\Frontend\SearchController;
use App\Http\Controllers\Frontend\BookInspectionController;

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });



Route::get('/', [UserController::class, 'Index']);
Route::get('/login', [UserController::class, 'UseLogin'])->name('login');
Route::get('/register', [UserController::class, 'UserRegister'])->name('register');

// Tenant
Route::get('/tenant/page', [TenantController::class, 'TenantPage'])->name('tenant.page');
Route::get('/tenant/buy/property', [TenantController::class, 'TenantBuyProperty'])->name('buy.tenant.property');
Route::get('/finished/property', [TenantController::class, 'FinishedProperty'])->name('finished.property');
Route::get('/finished/property2', [TenantController::class, 'FinishedProperty2'])->name('finished.property2');
Route::post('/store/finished/property/buy', [TenantController::class, 'StoreFinishedBuy'])->name('store.finished.buy');
Route::get('/unfinished/property', [TenantController::class, 'UnFinishedProperty'])->name('unfinished.property');
Route::post('/store/unfinished/property/buy', [TenantController::class, 'StoreUnFinishedBuy'])->name('store.unfinished.buy');
Route::get('/land/property', [TenantController::class, 'LandProperty'])->name('land.property');
Route::post('/store/land/property/buy', [TenantController::class, 'StoreLandBuy'])->name('store.land.buy');

// Investors
Route::get('/investor/page', [InvestorController::class, 'InvestorProperty'])->name('investor.page');
Route::post('/store/investor/property/buy', [InvestorController::class, 'StoreInvestorBuy'])->name('store.investor.buy');

// Subscribers
Route::post('/store/subscriber', [SubscriberController::class, 'StoreSubscriber'])->name('store.subscriber');

// Search
Route::post('/search/property', [SearchController::class, 'SearchProperty'])->name('search.property');

// Book Inspect Rent
// Route::get('/book/inpect/rent', [BookInspectionController::class, 'BookInspectRent'])->name('inspect.rent');




// User Protected Group Route Middleware
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::controller(UserController::class)->group(function(){
        Route::get('/user/logout', 'UserLogout')->name('user.logout');
        Route::get('/user/profile', 'UserProfile')->name('user.profile');
        Route::post('/user/profile/store', 'UserProfileStore')->name('user.profile.store');
        Route::get('/user/change/password', 'UserChangePassword')->name('user.change.password');
        Route::post('/user/update/password', 'UserUpdatePassword')->name('user.password.update');
        Route::get('/user/add/property', 'UserAddProperty')->name('add.user.property');
        Route::post('/user/store/property', 'UserStoreProperty')->name('store.user.property');
    });
});



Route::get('/dashboard', function () {
    return view('user.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Admin Protected Group Route Middleware
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::controller(AdminController::class)->group(function(){
        Route::get('/admin/dashboard', 'AdminDashboard')->name('admin.dashboard');
        Route::get('/admin/logout', 'AdminLogout')->name('admin.logout');
        Route::get('/admin/profile', 'AdminProfile')->name('admin.profile');
        Route::post('/admin/profile/store', 'AdminProfileStore')->name('admin.profile.store');
        Route::get('/admin/change/password', 'ChangePassword')->name('admin.change.password');
        Route::post('/admin/update/password', 'AdminUpdatePassword')->name('admin.password.update');
        Route::get('/delete/user/{id}', 'DeleteUser')->name('delete.user');
        Route::get('/change/status/user/{id}', 'ChangeStatusUser')->name('change.user.status');
        Route::get('all/users', 'AllUsers')->name('admin.users');
    });

    // Property Type Route for Admin
    Route::controller(PropertyTypeController::class)->group(function(){
        Route::get('/add/type', 'AddType')->name('add.type');
        Route::post('store/type', 'StoreType')->name('store.type');
        Route::get('/all/type', 'AllType')->name('all.type');
        Route::get('/edit/type/{id}', 'TypeEdit')->name('type.edit');
        Route::post('/update/type', 'UpdateType')->name('update.type');
        Route::get('/delete/type/{id}', 'TypeDelete')->name('type.delete');
    });

    // Property Route For Admin
    Route::controller(PropertyController::class)->group(function(){
        Route::get('/add/property', 'AddProperty')->name('add.property');
        Route::post('/store/property', 'StoreProperty')->name('store.property');
        Route::get('/all/property', 'AllProperty')->name('all.property');
        Route::get('change/property/status/{id}', 'ChangePropertyStatus')->name('change.property.status');
        Route::get('delete/property/{id}', 'DeleteProperty')->name('delete.property');
        Route::get('edit/property/{id}', 'EditProperty')->name('edit.property');
        Route::post('update/property', 'UpdateProperty')->name('update.property');
    });

    // Property Category Route for Admin
    // Route::controller(PropertyCategoryController::class)->group(function(){
    //     Route::get('/add/property/category', 'AddPropertyCategory')->name('add.property.category');
    //     Route::post('/store/category', 'StoreCategory')->name('store.category');
    //     Route::get('/all/property/category', 'AllPropertyCategory')->name('all.property.category');
    //     Route::get('edit/category/{id}', 'EditCatgegory')->name('edit.category');
    //     Route::post('update/category', 'UpdateCategory')->name('update.category');
    //     Route::get('delete/category/{id}', 'DeleteCategory')->name('delete.category');
    // });
});


Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login');



require __DIR__.'/auth.php';