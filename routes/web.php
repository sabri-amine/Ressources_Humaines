<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\MedicalController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\EvenmentController;
use App\Http\Controllers\CertafiqueController;
use App\Http\Controllers\ProfilesUserController;

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

Route::controller(AuthController::class)->group(function (){
    Route::get('register','register')->name('register');
    Route::post('register','registerSave')->name('register.save');

    Route::get('/', [AuthController::class, 'showLoginForm'])->name('login'); // Changed route from '/login' to '/'
    Route::post('/', 'loginAction')->name('login.action'); // Changed route from '/login' to '/'

    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});

Route::get('/Home',[HomeController::class, 'index'])->name('Home');



Route::middleware('isAdmin')->group(function(){
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin/home');
    Route::get('/admin/certificat', [CertafiqueController::class, 'index'])->name('admin/certificat');
    Route::get('/admin/home/{id}', [HomeController::class, 'show'])
    ->where('id','\d+')
    ->name('profiles.show');
    Route::get('/admin/profile', [HomeController::class, 'showadmin'])->name('admin.profile');
    Route::delete('/admin/delete/{id}', [HomeController::class, 'delete'])->name('admin.delete');
    Route::get('admin/daytoday',[EvenmentController::class,'index'])->name('daytoday.index');
    Route::get('admin/daytoday/create',[EvenmentController::class,'create'])->name('daytoday.create');
    Route::post('admin/daytoday/store',[EvenmentController::class,'store'])->name('daytoday.store');
    Route::delete('admin/daytoday/{evenment}', [EvenmentController::class,'delete'])->name('daytoday.delete');
    Route::get('admin/hotel', [HotelController::class, 'index'])->name('hotel.index');
    Route::get('admin/hotel/create', [HotelController::class, 'create'])->name('hotel.create');
    Route::post('admin/hotel/store', [HotelController::class, 'store'])->name('hotel.store');
    Route::delete('admin/hotel/{id}', [HotelController::class, 'delete'])->name('hotel.delete');
    Route::get('admin/hotel/{id}/edit',[HotelController::class, 'edit'])->name('hotel.edit');
    Route::put('admin/hotel/{id}',[HotelController::class, 'update'])->name('hotel.update');
    Route::get('admin/medical',[MedicalController::class,'index'])->name('medical.index');
    Route::get('admin/createMedical', [MedicalController::class, 'create'])->name('createMedical.create');
    Route::post('admin/medical/store',[MedicalController::class,'store'])->name('medical.store');
    Route::delete('admin/medical/{medical}',[MedicalController::class,'delete'])->name('medical.delete');
    Route::get('/payments/admin', [PaymentController::class, 'index'])->name('payments.index');
    Route::get('admin/medical/{medical}/edit',[medicalController::class, 'edit'])->name('medical.edit');
    Route::put('admin/medical/{medical}',[medicalController::class, 'update'])->name('medical.update');
    Route::post('valid',[CertafiqueController::class,'edit'])->name('valid');
    
});

Route::get('/userForm', [CertafiqueController::class, 'getform'])->name('userForm');
Route::post('reserver',[CertafiqueController::class,'store'])->name('reserver');
// Route::get('/AfficheProfleUser', [CertafiqueController::class, 'AfficheProfleUser'])->name('AfficheProfleUser');

Route::get('/user/hotels', [HotelController::class, 'show'])->name('userHotels.show');

############### Modifier Hotel #########################

Route::get('/profileUser', [HomeController::class, 'profileUser'])->name('user.profile');

############### Modifier user ou admin #########################

Route::get('users/profile/{id}/editUserProfile',[HomeController::class, 'editUserProfile'])->name('profile.editUserProfile');
Route::get('users/profile/{id}/edit',[HomeController::class, 'edit'])->name('profile.edit');
Route::put('user/profile/{id}',[HomeController::class, 'update'])->name('profile.update');

############### today #########################
Route::get('users/today',[EvenmentController::class,'show'])->name('today.show');


############### Modifier Medical #########################
Route::get('users/medicals',[MedicalController::class,'show'])->name('medicals.show');






Route::post('admin/payments', [PaymentController::class, 'store'])->name('payments.store');


