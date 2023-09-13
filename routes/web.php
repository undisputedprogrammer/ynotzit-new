<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MarketerController;
use App\Http\Controllers\AdministrationController;
use App\Http\Controllers\MailController;

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

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/services', [PageController::class, 'services'])->name('services');
Route::get('/blogs',[PageController::class, 'blogs'])->name('blogs');
Route::get('/contact',[PageController::class, 'contact'])->name('contact');
Route::post('/connect',[MailController::class, 'connect'])->name('connect');

Route::get('/offers/super-startup-offer' , [PageController::class, 'offer'])->name('super-startup-offer');
Route::get('/privacy-policy',[PageController::class, 'privacypolicy'])->name('privacy-policy');

Route::post('/offer/booking', [OfferController::class, 'book'])->name('book-offer');

Route::middleware('auth')->prefix('blog')->group(function(){

   Route::get('/upload',[BlogController::class, 'upload'])->name('upload-blog');
   Route::post('/save',[BlogController::class, 'save'])->name('save-blog');
   Route::get('/delete',[BlogController::class, 'delete'])->name('delete-blog');
   Route::get('/edit',[BlogController::class, 'edit'])->name('edit-blog');
   Route::post('/update',[BlogController::class, 'update'])->name('update-blog');

});

Route::get('/employee', [PageController::class, 'emp'])->middleware('auth')->name('employee-index');

Route::get('/blog/{slug?}',[BlogController::class, 'single'])->name('view-blog');




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/logout',[AdministrationController::class, 'logout'])->name('logout');

Route::middleware('auth')->prefix('admin')->group(function() {
    Route::get('/', [AdministrationController::class, 'index'])->name('admin.index');
    Route::get('/approve-affiliates',[AdministrationController::class, 'approveIndex'])->name('admin.approve-affiliates');
    Route::get('/manage-coupons',[AdministrationController::class, 'addCoupon'])->name('admin.coupons');
    Route::get('/manage-bookings',[AdministrationController::class, 'bookings'])->name('admin.bookings');
    Route::get('/manage-affiliates', [AdministrationController::class, 'getDetails'])->name('admin.affiliates');
    Route::get('/affiliate/reject', [AdministrationController::class, 'reject'])->name('admin.reject');
    Route::get('/affiliate/approve', [AdministrationController::class, 'approve'])->name('admin.approve');
    Route::post('/create-coupon',[AdministrationController::class, 'createCoupon'])->name('admin.create-coupon');
    Route::get('/update/booking-status',[AdministrationController::class, 'updateStatus'])->name('admin.update-booking-status');
    Route::get('/manage/affiliate-refferals',[AdministrationController::class, 'affiliatePayments'])->name('admin.manage-affiliate-refferals');
    Route::post('/affiliate/mark-payment', [AdministrationController::class, 'markPayment'])->name('admin.mark-payment');
});

Route::get('/affiliate/register', [MarketerController::class, 'registration'])->name('affiliate-register');

Route::post('/affiliate/registration/submit',[MarketerController::class, 'register'])->name('affiliate-submit-form');

Route::get('/affiliate/login', [MarketerController::class, 'affiliateLogin'])->name('affiliate-login');

Route::get('/marketer/login', [MarketerController::class, 'affiliateLogin'])->name('marketer-login');

Route::post('/affiliate/authenticate', [MarketerController::class, 'authenticate']);

// affiliate route group

Route::middleware('marketer')->prefix('affiliate')->group(function(){

    Route::get('/', [MarketerController::class, 'home'])->name('affiliate-home');
    Route::get('/manage-coupons', [MarketerController::class, 'manageCoupons'])->name('affiliate-coupons');
    Route::post('/coupon/create',[MarketerController::class, 'createCoupon'])->name('affiliate-create-coupon');
    Route::get('/refferals',[MarketerController::class,'refferals'])->name('affiliate-refferals');
    Route::get('/change-password',[MarketerController::class, 'changePassword'])->name('affiliate-change-password');
    Route::post('/password/store',[MarketerController::class, 'storePassword'])->name('affiliate-reset-password');
    Route::get('/logout',[MarketerController::class, 'destroy'])->name('affiliate-logout');

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
