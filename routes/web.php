<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Controllers\Koperasi\KoperasiCategoryBarangController;
use App\Http\Controllers\Koperasi\KoperasiBarangController;
use App\Http\Controllers\Koperasi\KoperasiMemberController;
use App\Http\Controllers\Koperasi\KoperasiProvinsiController;
use App\Http\Controllers\Koperasi\KoperasiKotaController;
use App\Http\Controllers\Front\FrontLoginController;

use App\Http\Controllers\LoginController;

use App\Http\Controllers\Spk\UsersController;
use App\Http\Controllers\Spk\KomputerController;
use App\Http\Controllers\Spk\KriteriaController;
use App\Http\Controllers\Spk\BobotController;


use App\Http\Controllers\Front\FrontLandingController;
use App\Http\Controllers\Front\FrontNewsController;
use App\Http\Controllers\Front\FrontNewsCategoryController;
use App\Http\Controllers\Front\FrontProductController;
use App\Http\Controllers\Front\FrontCartController;
use App\Http\Controllers\Front\FrontCheckoutController;
use App\Http\Controllers\Front\FrontPaymentController;

use App\Http\Controllers\Front\FrontBlogController;
use App\Http\Controllers\Front\FrontKelasOnlineController;
use App\Http\Controllers\Front\FrontKelasEksklusifController;
use App\Http\Controllers\Front\FrontPromoController;
use App\Http\Controllers\Front\FrontMembershipController;
use App\Http\Controllers\Front\FrontGalleryController;



use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PermissionController;

use App\Http\Controllers\Coupon\CouponController;

use App\Http\Controllers\Member\MemberController;
use App\Http\Controllers\Member\MemberOrderController;
use App\Http\Controllers\Member\MemberPointController;

use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Product\ProductCategoryController;
use App\Http\Controllers\Product\ProductKindController;
use App\Http\Controllers\Product\ProductVariantController;
use App\Http\Controllers\Product\ProductCollectionController;


use App\Http\Controllers\DashboardController;
use App\Http\Controllers\WebsetupController;
use App\Http\Controllers\Member\MemberBoardController;

use App\Http\Controllers\Member\MemberAddressBoardController;


use App\Http\Controllers\Order\OrderController;

use App\Http\Controllers\Discount\DiscountClusterController;
use App\Http\Controllers\Discount\DiscountController;
use App\Http\Controllers\Discount\DiscountProductController;

use App\Http\Controllers\Merchandise\MerchandiseProductController;
use App\Http\Controllers\Freegift\FreegiftController;
use App\Http\Controllers\Flashsale\FlashsaleController;

use App\Http\Controllers\Product\ProductImageController;
use App\Http\Controllers\FileController;

use App\Http\Controllers\Product\ProductTypeController;
use App\Http\Controllers\Product\ProductFormController;
use App\Http\Controllers\Product\ProductPackageController;

// use App\Http\Controllers\Admin\DiscountController;

use App\Http\Controllers\Blog\BlogArticleCategoryController;
use App\Http\Controllers\Blog\BlogArticleController;

use App\Http\Controllers\News\NewsCategoryController;
use App\Http\Controllers\News\NewsController;

use App\Http\Controllers\Kelasonline\KelasOnlineCategoryController;
use App\Http\Controllers\Kelasonline\KelasOnlineController;
use App\Http\Controllers\Kelasonline\KelasOnlineDetailController;

use App\Http\Controllers\Kelaseksklusif\KelasEksklusifCategoryController;
use App\Http\Controllers\Kelaseksklusif\KelasEksklusifController;
use App\Http\Controllers\Kelaseksklusif\KelasEksklusifDetailController;

use App\Http\Controllers\FpdfController;
use App\Http\Controllers\SlidersController;
use App\Http\Controllers\SyncProductController;
use App\Http\Controllers\CommonLoaderController;

use App\Http\Controllers\CrudBuilderController;


use App\Http\Controllers\StripeController;
use App\Http\Controllers\Vend\VendController;

use App\Http\Controllers\Auth\ForgotPasswordController;

// Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
// Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 
// Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
// Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');
//ROUTE SPK WP-TOPSIS --------------------------------------------------------------------------------------

Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'authenticate']);
// ROUTE SPK USERS
Route::get('users', [UsersController::class, 'index'])->name('users.list');
Route::get('users/show/{id}', [UsersController::class, 'show'])->name('users.show');
Route::get('users/add', [UsersController::class, 'create'])->name('users.create');
Route::post('users/store', [UsersController::class, 'store'])->name('users.add');
Route::get('users/edit/{id}', [UsersController::class, 'edit'])->name('users.edit');
Route::post('users/update/{id}', [UsersController::class, 'update'])->name('users.update');
Route::get('users/delete/{id}', [UsersController::class, 'destroy'])->name('users.destroy');

// ROUTE SPK KOMPUTER
Route::get('komputer', [KomputerController::class, 'index'])->name('komputer.list');
Route::get('komputer/show/{id}', [KomputerController::class, 'show'])->name('komputer.show');
Route::get('komputer/add', [KomputerController::class, 'create'])->name('komputer.create');
Route::post('komputer/store', [KomputerController::class, 'store'])->name('komputer.add');
Route::get('komputer/edit/{id}', [KomputerController::class, 'edit'])->name('komputer.edit');
Route::post('komputer/update/{id}', [KomputerController::class, 'update'])->name('komputer.update');
Route::get('komputer/delete/{id}', [KomputerController::class, 'destroy'])->name('komputer.destroy');
// ROUTE SPK KRITERIA
Route::get('kriteria', [KriteriaController::class, 'index'])->name('kriteria.list');
Route::get('kriteria/show/{id}', [KriteriaController::class, 'show'])->name('kriteria.show');
Route::get('kriteria/add', [KriteriaController::class, 'create'])->name('kriteria.create');
Route::post('kriteria/store', [KriteriaController::class, 'store'])->name('kriteria.add');
Route::get('kriteria/edit/{id}', [KriteriaController::class, 'edit'])->name('kriteria.edit');
Route::post('kriteria/update/{id}', [KriteriaController::class, 'update'])->name('kriteria.update');
Route::get('kriteria/delete/{id}', [KriteriaController::class, 'destroy'])->name('kriteria.destroy');
// ROUTE SPK BOBOT
Route::get('bobot', [BobotController::class, 'index'])->name('bobot.list');
Route::get('bobot/show/{id}', [BobotController::class, 'show'])->name('bobot.show');
Route::get('bobot/add', [BobotController::class, 'create'])->name('bobot.create');
Route::post('bobot/store', [BobotController::class, 'store'])->name('bobot.add');
Route::get('bobot/edit/{id}', [BobotController::class, 'edit'])->name('bobot.edit');
Route::post('bobot/update/{id}', [BobotController::class, 'update'])->name('bobot.update');
Route::get('bobot/delete/{id}', [BobotController::class, 'destroy'])->name('bobot.destroy');


// // ROUTE KOPERASI --------------------------------------------------------------------------------

// //ROUTE CATEGORY
// Route::get('koperasicategorybarang', [KoperasiCategoryBarangController::class, 'index'])->name('koperasicategorybarang.list');

// Route::get('koperasicategorybarang/show/{id}', [KoperasiCategoryBarangController::class, 'show'])->name('koperasicategorybarang.show');

// Route::get('koperasicategorybarang/add', [KoperasiCategoryBarangController::class, 'create'])->name('koperasicategorybarang.create');

// Route::post('koperasicategorybarang/store', [KoperasiCategoryBarangController::class, 'store'])->name('koperasicategorybarang.add');

// Route::get('koperasicategorybarang/edit/{id}', [KoperasiCategoryBarangController::class, 'edit'])->name('koperasicategorybarang.edit');


// Route::post('koperasicategorybarang/update/{id}', [KoperasiCategoryBarangController::class, 'update'])->name('koperasicategorybarang.update');

// Route::get('koperasicategorybarang/delete/{id}', [KoperasiCategoryBarangController::class, 'destroy'])->name('koperasicategorybarang.destroy');

// //ROUTE BARANG

// Route::get('koperasibarang', [KoperasiBarangController::class, 'index'])->name('koperasibarang.list');

// Route::get('koperasibarang/show/{id}', [KoperasiBarangController::class, 'show'])->name('koperasibarang.show');

// Route::get('koperasibarang/add', [KoperasiBarangController::class, 'create'])->name('koperasibarang.create');

// Route::post('koperasibarang/store', [KoperasiBarangController::class, 'store'])->name('koperasibarang.add');

// Route::get('koperasibarang/edit/{id}', [KoperasiBarangController::class, 'edit'])->name('koperasibarang.edit');


// Route::post('koperasibarang/update/{id}', [KoperasiBarangController::class, 'update'])->name('koperasibarang.update');

// Route::get('koperasibarang/delete/{id}', [KoperasiBarangController::class, 'destroy'])->name('koperasibarang.destroy');

// // ROUTE MEMBER
// Route::get('koperasimember', [KoperasiMemberController::class, 'index'])->name('koperasimember.list');

// Route::get('koperasimember/show/{id}', [KoperasiMemberController::class, 'show'])->name('koperasimember.show');

// Route::get('koperasimember/add', [KoperasiMemberController::class, 'create'])->name('koperasimember.create');

// Route::post('koperasimember/store', [KoperasiMemberController::class, 'store'])->name('koperasimember.add');

// Route::get('koperasimember/edit/{id}', [KoperasiMemberController::class, 'edit'])->name('koperasimember.edit');


// Route::post('koperasimember/update/{id}', [KoperasiMemberController::class, 'update'])->name('koperasimember.update');

// Route::get('koperasimember/delete/{id}', [KoperasiMemberController::class, 'destroy'])->name('koperasimember.destroy');


// // ROUTE PROVINSI
// Route::get('koperasiprovinsi', [KoperasiProvinsiController::class, 'index'])->name('koperasiprovinsi.list');

// Route::get('koperasiprovinsi/show/{id}', [KoperasiProvinsiController::class, 'show'])->name('koperasiprovinsi.show');

// Route::get('koperasiprovinsi/add', [KoperasiProvinsiController::class, 'create'])->name('koperasiprovinsi.create');

// Route::post('koperasiprovinsi/store', [KoperasiProvinsiController::class, 'store'])->name('koperasiprovinsi.add');

// Route::get('koperasiprovinsi/edit/{id}', [KoperasiProvinsiController::class, 'edit'])->name('koperasiprovinsi.edit');


// Route::post('koperasiprovinsi/update/{id}', [KoperasiProvinsiController::class, 'update'])->name('koperasiprovinsi.update');

// Route::get('koperasiprovinsi/delete/{id}', [KoperasiProvinsiController::class, 'destroy'])->name('koperasiprovinsi.destroy');

// // ROUTE KOTA
// Route::get('koperasikota', [KoperasiKotaController::class, 'index'])->name('koperasikota.list');

// Route::get('koperasikota/show/{id}', [KoperasiKotaController::class, 'show'])->name('koperasikota.show');

// Route::get('koperasikota/add', [KoperasiKotaController::class, 'create'])->name('koperasikota.create');

// Route::post('koperasikota/store', [KoperasiKotaController::class, 'store'])->name('koperasikota.add');

// Route::get('koperasikota/edit/{id}', [KoperasiKotaController::class, 'edit'])->name('koperasikota.edit');


// Route::post('koperasikota/update/{id}', [KoperasiKotaController::class, 'update'])->name('koperasikota.update');

// Route::get('koperasikota/delete/{id}', [KoperasiKotaController::class, 'destroy'])->name('koperasikota.destroy');

// Route::get('/crudbuilder', [CrudBuilderController::class, 'index']);

// Route::get('/cobastripe',         [StripeController::class, 'index']);
// Route::post('/cobastripepayment', [StripeController::class, 'payment']);
// Route::post('/stripecheckouts', [StripeController::class, 'createSession']);
// Route::post('/paypalcheckouts', [StripeController::class, 'paypalpayment']);
// Route::post('/paypalsuccess', [StripeController::class, 'paypalpayment'])->name('paypalpayment.success');
// Route::post('/paypalcancel', [StripeController::class, 'paypalcancel'])->name('paypalpayment.cancel');

// Route::post('/choosegift', [FrontCartController::class, 'chooseGift'])->name('cart.choosegift');

// Route::get('/getstripepayments', [StripeController::class, 'getstripepayments']);

// Route::get('/updatepaymentstatus', [StripeController::class, 'updatePaymentstatus'])->name('updatepaymentstatus');

// Route::get('/sendmail', [StripeController::class, 'sendMail'])->name('sendmail');


// Route::get('/vend-getproduct', [VendController::class, 'getproduct']);
// Route::get('/vend-gettransaction', [VendController::class, 'gettransaction']);
// Route::get('/vend-gettransactionbyemail', [VendController::class, 'gettransactionbyemail']);

// /*
// |--------------------------------------------------------------------------
// | Web Routes
// |--------------------------------------------------------------------------
// |
// | Here is where you can register web routes for your application. These
// | routes are loaded by the RouteServiceProvider within a group which
// | contains the "web" middleware group. Now create something great!
// |
// */


// Auth::routes();



// Route::get('file', [FileController::class, 'create']);
// Route::post('file', [FileController::class, 'store']);

// //Route::get('/', [App\Http\Controllers\HomeController::class, 'root']);
// Route::get('/index', [App\Http\Controllers\HomeController::class, 'index']);

// Route::get('/memberaddress', [App\Http\Controllers\Member\MemberAddressBoardController::class, 'index'])->name('memberaddress.list');;
// Route::post('/memberaddress', [App\Http\Controllers\Member\MemberAddressBoardController::class, 'store'])->name('memberaddress.store');;
// // Route::get('{any}', [App\Http\Controllers\HomeController::class, 'index']);
// // //Language Translation
// // Route::get('index/{locale}', [App\Http\Controllers\HomeController::class, 'lang']);
// // Route::post('/formsubmit', [App\Http\Controllers\HomeController::class, 'FormSubmit'])->name('FormSubmit');
// // Route::get('/product', [App\Http\Controllers\ProductController::class, 'index']);
// // Route::get('/product/create', [App\Http\Controllers\ProductController::class, 'create']);
// // Route::resource('/product', App\Http\Controllers\ProductController::class);
// // Route::post('/product', [App\Http\Controllers\ProductController::class, 'store']);
// // Route::get('/product/create', [App\Http\Controllers\ProductController::class, 'create']);
// // Route::get('/home', [HomeController::class, 'index'])->name('home');
// // Route::get('/login', [HomeController::class, 'index'])->name('home');


// Route::group(['middleware' => ['auth']], function () {
//     Route::resource('admin/dashboard', DashboardController::class);
//     Route::resource('admin/websetup', WebsetupController::class);
//     Route::resource('member/board', MemberBoardController::class);
//     Route::resource('fpdf', FpdfController::class);
//     Route::resource('sync-product', SyncProductController::class);
//     Route::resource('roles', RoleController::class);
//     Route::resource('users', UserController::class);

//     Route::resource('news', NewsController::class);
//     Route::resource('newscategory', NewsCategoryController::class);

//     Route::resource('kelasonline', KelasOnlineController::class);
//     Route::resource('kelasonlinecategory', KelasOnlineCategoryController::class);
//     Route::resource('kelasonlinedetail', KelasOnlineDetailController::class);

//     Route::resource('kelaseksklusif', KelasEksklusifController::class);
//     Route::resource('kelaseksklusifcategory', KelasEksklusifCategoryController::class);
//     Route::resource('kelaseksklusifdetail', KelasEksklusifDetailController::class);

    

//     Route::resource('permissions', PermissionController::class);
//     Route::resource('admin/products', ProductController::class);
//     Route::resource('admin/product-kinds', ProductKindController::class);
//     Route::resource('admin/product-variants', ProductVariantController::class);
//     Route::resource('admin/product-categorys', ProductCategoryController::class);

//     Route::resource('admin/product-images', ProductImageController::class);

//     Route::resource('admin/product-collections', ProductCollectionController::class);
//     Route::resource('admin/product-types', ProductTypeController::class);
//     Route::resource('admin/product-forms', ProductFormController::class);
//     Route::resource('admin/product-packages', ProductPackageController::class);

//     ## STORE PANEL
//     Route::resource('admin/orders', OrderController::class);
//     Route::post('admin/orders', [App\Http\Controllers\Order\OrderController::class, 'index'])->name('orderslist');

//     Route::post('admin/orders-tracking-number', [App\Http\Controllers\Order\OrderController::class, 'updatetrackingnumber'])->name('orders-tracking-number');
//     Route::get('admin/ordersdetail', [App\Http\Controllers\Order\OrderDetailController::class, 'index'])->name('ordersdetail');

//     Route::resource('admin/discount-cluster', DiscountClusterController::class);
//     Route::resource('admin/discount', DiscountController::class);
//     Route::get('discount-addall', [App\Http\Controllers\Discount\DiscountController::class, 'addall'])->name('discount-addall');
//     Route::post('discount-storeall', [App\Http\Controllers\Discount\DiscountController::class, 'storeall'])->name('discount-storeall');
//     Route::resource('admin/discount-product', DiscountProductController::class);

//     Route::resource('admin/merchandise-product', MerchandiseProductController::class);
//     Route::resource('admin/freegift', FreegiftController::class);
//     Route::resource('admin/flashsale', FlashsaleController::class);

//     // Route::resource('admin/discount', DiscountController::class);
//     Route::resource('blog-article-category', BlogArticleCategoryController::class);
//     Route::resource('blog-article', BlogArticleController::class);

//     Route::resource('members', MemberController::class);
//     Route::resource('memberorders', MemberOrderController::class);
//     Route::resource('memberpoints', MemberPointController::class);
//     Route::get('expectopatronum', [MemberController::class, 'expectopatronum'])->name('expectopatronum');
//     Route::get('shazam', [MemberController::class, 'shazam'])->name('shazam');
    
//     Route::resource('sliders', SlidersController::class);
// });

// // Route::get('/flogin', function () {
// //     // Only authenticated users may access this route...
// // })->middleware('auth');
// // Route::get('loginmember', ['as' => 'auth.login', 'uses' => 'FrontLoginController@showLoginForm']);
// Route::resource('fnews', FrontNewsController::class);

// Route::resource('fblog', FrontBlogController::class);
// Route::resource('fkelasonline', FrontKelasOnlineController::class);
// Route::resource('fkelaseksklusif', FrontKelasEksklusifController::class);
// Route::resource('fpromo', FrontPromoController::class);


// Route::resource('fproducts', FrontProductController::class);
// // Route::resource('fproducts/{collection}/{form}/{sorting}', FrontProductController::class);
// // Route::resource('fcarts', FrontCartController::class);

// Route::get('fcart', [FrontCartController::class, 'cartList'])->name('cart.list');
// Route::post('fcart', [FrontCartController::class, 'addToCart'])->name('cart.store');
// Route::post('fcart-modal', [FrontCartController::class, 'addToCartModal'])->name('cartmodal.store');
// Route::post('update-cart', [FrontCartController::class, 'updateCart'])->name('cart.update');
// Route::post('remove', [FrontCartController::class, 'removeCart'])->name('cart.remove');
// Route::post('clear', [FrontCartController::class, 'clearAllCart'])->name('cart.clear');
// Route::post('cart-update-discount', [FrontCartController::class, 'updateDiscountCart'])->name('cart.updatediscount');



// Route::get('fcheckouts', [FrontCheckoutController::class, 'index'])->name('checkout.index');
// Route::post('fpayment', [FrontCheckoutController::class, 'payment'])->name('payment');
// Route::post('fpaymentstripe', [FrontCheckoutController::class, 'paymentstripe'])->name('paymentstripe');
// Route::post('fpaymentpaypal', [FrontCheckoutController::class, 'paymentpaypal'])->name('paymentpaypal');

// Route::post('checkshipping', [FrontCheckoutController::class, 'indexshipping'])->name('checkout.indexshipping');
// Route::post('fcheckouts', [FrontCheckoutController::class, 'AddShipping'])->name('checkout.addshipping');

// Route::get('fmachines', [FrontMachinesController::class, 'index'])->name('front.machines.index');
// Route::get('fexplore', [FrontExploreController::class, 'index'])->name('front.explore.index');
// Route::get('fpartnership', [FrontPartnershipController::class, 'index'])->name('front.partnership.index');
// Route::get('fcafe', [FrontCafeController::class, 'index'])->name('front.cafe.index');
// Route::get('fmembership', [FrontMembershipController::class, 'index'])->name('front.membership.index');
// Route::get('fgallery', [FrontGalleryController::class, 'index'])->name('front.gallery.index');


// Route::get('/landing', function () {
//     return view('ui/landing', [
//         "title" => "Home",
//         "pages" => "landing"
//     ]);
// });

// Route::get('/', [FrontLandingController::class, 'index'])->name('landing');
// // USER INTERFACE
// // home pages
// // Route::get('/ui/', function () {
// //     return view('ui/landing', [
// //         "title" => "Home",
// //         "pages" => "landing"
// //     ]);
// // });

// Route::get('/slider-load', [CommonLoaderController::class, 'loadSlider']);
// Route::post('/product-carousel-load', [CommonLoaderController::class, 'loadCarouselCategory']);
// Route::get('/product-data-load/{collection}/{form}/{sorting}', [CommonLoaderController::class, 'loadProductData']);

// Route::get('/coffee', function () {
//     return view('ui/coffee', [
//         "title" => "Coffee Collection",
//         "pages" => "product"
//     ]);
// });

// Route::get('/detail-coffee', function () {
//     return view('ui/detail-coffee', [
//         "title" => "Detail Coffee",
//         "pages" => "detail"
//     ]);
// });

// // cart pages
// Route::get('/cart', function () {
//     return view('ui/cart', [
//         "title" => "Shopping Cart",
//         "pages" => "cart"
//     ]);
// });

// // checkout pages
// Route::get('/checkout', function () {
//     return view('ui/checkout', [
//         "title" => "Shipping & Checkout",
//         "pages" => "checkout"
//     ]);
// });

// // user pages
// Route::get('/user', function () {
//     return view('ui/user', [
//         "title" => "Account",
//         "pages" => "user"
//     ]);
// });

// // signin pages
// Route::get('/signin', function () {
//     return view('ui/signin', [
//         "title" => "Sign In",
//         "pages" => "signin"
//     ]);
// });

// // signup pages
// Route::get('/signup', function () {
//     return view('ui/signup', [
//         "title" => "Sign Up",
//         "pages" => "signup"
//     ]);
// });

// // gallery pages
// Route::get('/gallery', function () {
// 	return view('ui/gallery', [
// 		"title" => "Gallery",
// 		"pages" => "gallery"
// 	]);
// });

// // cafe pages
// Route::get('/cafe', function () {
// 	return view('ui/cafe', [
// 		"title" => "Cafe",
// 		"pages" => "cafe"
// 	]);
// });

// // partnership pages
// Route::get('/partnership', function () {
// 	return view('ui/partnership', [
// 		"title" => "Partnership",
// 		"pages" => "partnership"
// 	]);
// });

// // explore pages
// Route::get('/explore', function () {
// 	return view('ui/explore', [
// 		"title" => "Explore",
// 		"pages" => "explore"
// 	]);
// });

// // membership pages
// Route::get('/membership', function () {
// 	return view('ui/membership', [
// 		"title" => "Membership",
// 		"pages" => "membership"
// 	]);
// });

// // machines pages
// Route::get('/machines', function () {
// 	return view('ui/machines', [
// 		"title" => "Kraton",
// 		"pages" => "machines"
// 	]);
// });

// // master
// Route::get('/master', function () {
// 	return view('ui/master', [
// 		"title" => "master",
// 		"pages" => "master"
// 	]);
// });
