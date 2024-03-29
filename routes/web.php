<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminInspectionController;
use App\Http\Controllers\Backend\PropertyController;
use App\Http\Controllers\Backend\PropertyTypeController;
use App\Http\Controllers\Backend\CarouselController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\ExportImportController;
use App\Http\Controllers\Backend\LocationController;
use App\Http\Controllers\Backend\MessageController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\TestimonialController;
use App\Http\Controllers\Frontend\BlogController as FrontendBlogController;
use App\Http\Controllers\Frontend\TenantController;
use App\Http\Controllers\Frontend\PropertyCategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Frontend\InvestorController;
use App\Http\Controllers\Frontend\SubscriberController;
use App\Http\Controllers\Frontend\SearchController;
use App\Http\Controllers\Frontend\BookInspectionController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\FooterController;
use App\Http\Controllers\Frontend\PriceController;
use App\Http\Controllers\Frontend\RentPropertyController;
use App\Http\Controllers\Frontend\ServicesController;
use App\Http\Controllers\PaystackController;
use App\Http\Middleware\RedirectIfAuthenticated;
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


Route::group(["middleware" => "prevent-back-history"], function () {


    Route::get('/', [UserController::class, 'Index']);
    Route::get('/login', [UserController::class, 'UseLogin'])->name('login');
    Route::get('/register', [UserController::class, 'UserRegister'])->name('register');
    Route::get('/about/us', [UserController::class, 'AboutUs'])->name('about.us');

    // Footer Route
    Route::get('/our/partners', [FooterController::class, 'OurPartners'])->name('our.partners');
    Route::get('/faq', [FooterController::class, 'FAQ'])->name('faq');
    Route::get('/show/testimonial', [FooterController::class, 'ShowTestimonial'])->name('show.testimonial');

    // Contact Route
    Route::get('/contact/page', [ContactController::class, 'ContactPage'])->name('contact.page');
    Route::post('/store/contact', [ContactController::class, 'StoreContact'])->name('store.contact');

    // Blog Details Route
    Route::get('/blog/details/{slug}', [BlogController::class, 'BlogDetails']);

    // Blog Route
    Route::get('/all/blog', [FrontendBlogController::class, 'AllBlog'])->name('all.blogs');

    // Blog Comment
    Route::post('/store/comment', [BlogController::class, 'StoreComment'])->name('store.comment');
    Route::get('/admin/blog/comment', [BlogController::class, 'AdminBlogComment'])->name('admin.blog.comment');
    Route::get('/admin/comment/reply/{id}', [BlogController::class, 'AdminCommentReply'])->name('admin.comment.reply');
    Route::post('/reply/message', [BlogController::class, 'ReplyMessage'])->name('reply.message');


    // Rent Property Route
    Route::get('/rent/property', [RentPropertyController::class, 'RentProperty'])->name('rent.property');
    Route::get('/rent/property/{id}', [RentPropertyController::class, 'RentPropertyTenant'])->name('rent.property.tenant');
    Route::post('/store/rent/property', [RentPropertyController::class, 'StoreRentProperty'])->name('store.rent.property');

    // Read Services Route
    Route::get('/our/services', [ServicesController::class, 'ReadServices'])->name('read.services');

    // Price Filter
    Route::get('/filter/price', [PriceController::class, 'PriceFilter']);
    Route::post('/store/filter', [PriceController::class, 'StoreFilter'])->name('store.filter');
    Route::post('/store/filter/finished', [PriceController::class, 'StoreFilterFinished'])->name('store.filter.finished');
    Route::post('/store/filter/unfinished', [PriceController::class, 'StoreFilterUnfinished'])->name('store.filter.unfinished');
    Route::post('/store/filter/land', [PriceController::class, 'StoreFilterLand'])->name('store.filter.land');

    // PropertyCategory
    Route::get('/land/property', [PropertyCategoryController::class, 'LandProperty'])->name('land.property');
    Route::get('/short/let/property', [PropertyCategoryController::class, 'ShortLetProperty'])->name('short.let');
    Route::get('/finished/property', [PropertyCategoryController::class, 'FinishedProperty'])->name('finished.property');
    Route::get('/finished/properties/details/{id}', [PropertyCategoryController::class, 'FinishPropertyDetails'])->name('finish.properties.details');
    Route::get('/buy/finish/property/{id}', [PropertyCategoryController::class, 'BuyFinishedProperty'])->name('buy.finished.property');
    Route::post('/store/finished/buy', [PropertyCategoryController::class, 'StoreFinishedBuy'])->name('store.finished.buy');
    Route::get('/unfinished/property', [PropertyCategoryController::class, 'UnFinishedProperty'])->name('unfinished.property');
    Route::get('/unfinished/property/city', [PropertyCategoryController::class, 'UnFinishedProperty2'])->name('unfinished.property.city');
    Route::post('/search/property/city/unfinished', [PropertyCategoryController::class, 'SearchPropertyCity2'])->name('search.property.city2');
    Route::get('/land/property/city', [PropertyCategoryController::class, 'LandPropertyCity'])->name('land.property.city');
    Route::post('/search/property/city/land', [PropertyCategoryController::class, 'SearchPropertyCityLand'])->name('search.property.city.land');
    Route::get('/buy/unfinished/property/{id}', [PropertyCategoryController::class, 'BuyUnFinishedProperty'])->name('buy.unfinished.property');
    Route::get('/unfinished/properties/details/{id}', [PropertyCategoryController::class, 'UnFinishPropertyDetails'])->name('unfinish.properties.details');
    Route::get('/buy/unfinished/property/{id}', [PropertyCategoryController::class, 'BuyUnFinishedProperty'])->name('buy.unfinished.property');
    Route::post('/store/unfinished/buy', [PropertyCategoryController::class, 'StoreUnFinishedBuy'])->name('store.unfinished.buy');
    Route::get('/show/all/properties', [PropertyCategoryController::class, 'ShowAllProperties'])->name('show.all.properties');
    Route::get('/finished/property/city', [PropertyCategoryController::class, 'FinishedProperty2'])->name('finished.property2');
    // Route::get('/finished/property/lekki', [PropertyCategoryController::class, 'Lekki'])->name('Lekki');
    Route::get('/property/checkbox', [PropertyCategoryController::class, 'PropertyTypes'])->name('property.type.checkbox');
    Route::post('/store/property/checkbox', [PropertyCategoryController::class, 'ShopFilter'])->name('shop.filter');

    Route::post('/search/property/city', [PropertyCategoryController::class, 'SearchPropertyCity'])->name('search.property.city');

    Route::post('/store/filter/property/type/finished', [PropertyCategoryController::class, 'SearchPropertyType'])->name('store.filter.property.type');
    Route::post('/store/filter/property/type/unfinished', [PropertyCategoryController::class, 'SearchPropertyType2'])->name('store.filter.property.type2');
    Route::post('/store/filter/property/type/land', [PropertyCategoryController::class, 'SearchPropertyType3'])->name('store.filter.property.type3');

    // Book Inspection
    Route::get('/inspect/property/{id}', [BookInspectionController::class, 'InspectProperty'])->name('inspect.property');
    Route::post('/store/inspect/property', [BookInspectionController::class, 'StoreInspectProperty'])->name('store.inspect.property');



    // Tenant
    Route::get('/tenant/page', [TenantController::class, 'TenantPage'])->name('tenant.page');
    Route::get('/tenant/buy/property', [TenantController::class, 'TenantBuyProperty'])->name('buy.tenant.property');


    Route::post('/store/land/property/buy', [TenantController::class, 'StoreLandBuy'])->name('store.land.buy');


    // Subscribers
    Route::post('/store/subscriber', [SubscriberController::class, 'StoreSubscriber'])->name('store.subscriber');

    // Search
    Route::post('/search/property', [SearchController::class, 'SearchProperty'])->name('search.property');




    // User Protected Group Route Middleware
    Route::middleware(['auth', 'role:user'])->group(function () {
        Route::controller(UserController::class)->group(function () {
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
    })->middleware(['auth', 'roles:user', 'verified'])->name('dashboard');

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });


    // Admin Protected Group Route Middleware
    Route::middleware(['auth', 'role:admin'])->group(function () {
        Route::controller(AdminController::class)->group(function () {
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
        Route::controller(PropertyTypeController::class)->group(function () {
            Route::get('/add/type', 'AddType')->name('add.type');
            Route::post('store/type', 'StoreType')->name('store.type');
            Route::get('/all/type', 'AllType')->name('all.type');
            Route::get('/edit/type/{id}', 'TypeEdit')->name('type.edit');
            Route::post('/update/type', 'UpdateType')->name('update.type');
            Route::get('/delete/type/{id}', 'TypeDelete')->name('type.delete');
        });

        // Property Route For Admin
        Route::controller(PropertyController::class)->group(function () {
            Route::get('/add/property', 'AddProperty')->name('add.property');
            Route::post('/store/property', 'StoreProperty')->name('store.property');
            Route::get('/all/property', 'AllProperty')->name('all.property');
            Route::get('change/property/status/{id}', 'ChangePropertyStatus')->name('change.property.status');
            Route::get('delete/property/{id}', 'DeleteProperty')->name('delete.property');
            Route::get('edit/property/{id}', 'EditProperty')->name('edit.property');
            Route::post('update/property', 'UpdateProperty')->name('update.property');
        });

        // Inspection Route For Admin
        Route::controller(AdminInspectionController::class)->group(function () {
            Route::get('/admin/inspection', 'AdminBookingInspect')->name('admin.inspection');
            Route::get('/inspect/property/status/{id}', 'InspectPropertyStatus')->name('inspect.property.status');
        });

        // Location Route For Admin
        Route::controller(LocationController::class)->group(function () {
            Route::get('/add/location', 'AddLocation')->name('add.location');
            Route::post('/store/location', 'StoreLocation')->name('store.location');
            Route::get('/all/location', 'AllLocation')->name('all.location');
            Route::get('/edit/location/{id}', 'EditLocation')->name('city.edit');
            Route::post('/update/location', 'UpdateLocation')->name('update.location');
            Route::get('/delete/location/{id}', 'DeleteLocation')->name('city.delete');
        });

        // Carousel Route For Admin
        Route::controller(CarouselController::class)->group(function () {
            Route::get('/add/carousel', 'AddCarousel')->name('add.carousel');
            Route::post('/store/carousel', 'StoreCarousel')->name('store.carousel');
            Route::get('/all/carousel', 'AllCarousel')->name('all.carousel');
            Route::get('/edit/carousel/{id}', 'EditCarousel')->name('edit.carousel');
            Route::post('/update/carousel', 'UpdateCarousel')->name('update.carousel');
            Route::get('/delete/carousel/{id}', 'DeleteCarousel')->name('delete.carousel');
        });

        // Testimonial Route For Admin
        Route::controller(TestimonialController::class)->group(function () {
            Route::get('/add/testimonial', 'AddTestimonial')->name('add.testimonial');
            Route::post('/store/testimonial', 'StoreTestimonial')->name('store.testimonial');
            Route::get('/all/testimonial', 'AllTestimonial')->name('all.testimonial');
            Route::get('/edit/testimonial/{id}', 'EditTestimonial')->name('edit.testimonial');
            Route::post('/update/testimonial', 'UpdateTestimonial')->name('update.testimonial');
            Route::get('/delete/testimonial/{id}', 'DeleteTestimonial')->name('delete.testimonial');
        });


        // Blog Category For Admin
        Route::controller(BlogController::class)->group(function () {
            Route::get('/blog/category', 'AllBlogCategory')->name('all.blog.category');
            Route::post('/store/blog/category', 'StoreBlogCategory')->name('store.blog.category');
            Route::get('/edit/blog/category/{id}', 'EditBlogCategory')->name('cat.edit');
            Route::post('/update/blog/category', 'UpdateBlogCategory')->name('update.blog.category');
            Route::get('/delete/blog/category/{id}', 'DeleteBlogCategory')->name('cat.delete');
            Route::get('/all/blog/post', 'AllPost')->name('all.post');
            Route::get('/add/blog/post', 'AddPost')->name('add.post');
            Route::post('/store/blog/post', 'StorePost')->name('store.post');
            Route::get('/edit/blog/post/{id}', 'EditPost')->name('edit.post');
            Route::post('/update/blog/post', 'UpdatePost')->name('update.post');
            Route::get('/delete/blog/post/{id}', 'DeletePost')->name('delete.post');
        });

        // Roles and Permissions For Admin
        Route::controller(RoleController::class)->group(function () {
            Route::get('/all/permission', 'AllPermission')->name('all.permission');
            Route::get('/add/permission', 'AddPermission')->name('add.permission');
            Route::post('/store/permission', 'StorePermission')->name('store.permission');
            Route::get('/edit/permission/{id}', 'EditPermission')->name('edit.permission');
            Route::post('/update/permission', 'UpdatePermission')->name('update.permission');
            Route::get('/delete/permission/{id}', 'DeletePermission')->name('delete.permission');
            // Route::get('/all/carousel', 'AllCarousel')->name('all.carousel');
            // Route::get('/edit/carousel/{id}', 'EditCarousel')->name('edit.carousel');
            // Route::post('/update/carousel', 'UpdateCarousel')->name('update.carousel');
            // Route::get('/delete/carousel/{id}', 'DeleteCarousel')->name('delete.carousel');
            Route::get('/all/roles', 'AllRoles')->name('all.roles');
            Route::get('/add/roles', 'AddRoles')->name('add.roles');
            Route::post('/store/roles', 'StoreRoles')->name('store.roles');
            Route::get('/edit/roles/{id}', 'EditRoles')->name('edit.roles');
            Route::post('/update/roles', 'UpdateRoles')->name('update.roles');
            Route::get('/delete/roles/{id}', 'DeleteRoles')->name('delete.roles');
            Route::get('/add/roles/permission', 'AllRolesPermission')->name('add.roles.permission');
        });

        // Message to Admin Route
        Route::controller(MessageController::class)->group(function () {
            Route::get('/admin/message', 'AdminMessage')->name('admin.message');
        });

        // Export/Import CSV File
        Route::controller(ExportImportController::class)->group(function () {
            Route::get('/import/property', 'ImportProperty')->name('import.property');
            Route::get('/export', 'Export')->name('export');
            Route::post('/import', 'Import')->name('import');
        });
    });


    Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login')->middleware(RedirectIfAuthenticated::class);


    // Paystack Controller
    Route::get('callback', [PaystackController::class, 'callback'])->name('callback');
    Route::get('success', [PaystackController::class, 'success'])->name('success');
    Route::get('cancel', [PaystackController::class, 'cancel'])->name('cancel');
});

require __DIR__ . '/auth.php';
