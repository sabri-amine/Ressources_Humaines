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

Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin/home');
Route::get('/admin/home/{id}', [HomeController::class, 'show'])
->where('id','\d+')
->name('profiles.show');

Route::post('/reserver',[CertafiqueController::class,'store'])->name('reserver');
Route::post('/valid',[CertafiqueController::class,'edit'])->name('valid');
Route::get('/admin/certificat', [CertafiqueController::class, 'index'])->name('admin/certificat');
Route::get('/userForm', [CertafiqueController::class, 'getform'])->name('userForm');
// Route::get('/AfficheProfleUser', [CertafiqueController::class, 'AfficheProfleUser'])->name('AfficheProfleUser');

Route::get('/user/hotels', [HotelController::class, 'show'])->name('userHotels.show');

Route::get('/hotel', [HotelController::class, 'index'])->name('hotel.index');
Route::get('/hotel/create', [HotelController::class, 'create'])->name('hotel.create');
Route::post('/hotel/store', [HotelController::class, 'store'])->name('hotel.store');
Route::delete('/hotel/{id}', [HotelController::class, 'delete'])->name('hotel.delete');

############### Modifier Hotel #########################

Route::get('/hotel/{id}/edit',[HotelController::class, 'edit'])->name('hotel.edit');
Route::put('/hotel/{id}',[HotelController::class, 'update'])->name('hotel.update');


Route::get('/admin/profile', [HomeController::class, 'showadmin'])->name('admin.profile');
Route::delete('/admin/delete/{id}', [HomeController::class, 'delete'])->name('admin.delete');



Route::get('/profileUser', [HomeController::class, 'profileUser'])->name('user.profile');

############### Modifier user ou admin #########################

Route::get('/profile/{id}/editUserProfile',[HomeController::class, 'editUserProfile'])->name('profile.editUserProfile');

Route::get('/profile/{id}/edit',[HomeController::class, 'edit'])->name('profile.edit');
Route::put('/profile/{id}',[HomeController::class, 'update'])->name('profile.update');





Route::get('/daytoday',[EvenmentController::class,'index'])->name('daytoday.index');
Route::get('/daytoday/create',[EvenmentController::class,'create'])->name('daytoday.create');
Route::post('/daytoday/store',[EvenmentController::class,'store'])->name('daytoday.store');
Route::delete('/daytoday/{evenment}', [EvenmentController::class,'delete'])->name('daytoday.delete');
Route::get('/today',[EvenmentController::class,'show'])->name('today.show');


Route::get('/medical',[MedicalController::class,'index'])->name('medical.index');
Route::get('/createMedical', [MedicalController::class, 'create'])->name('createMedical.create');
Route::post('/medical/store',[MedicalController::class,'store'])->name('medical.store');
Route::delete('/medical/{medical}',[MedicalController::class,'delete'])->name('medical.delete');
Route::get('/medicals',[MedicalController::class,'show'])->name('medicals.show');


############### Modifier Medical #########################

Route::get('/medical/{medical}/edit',[medicalController::class, 'edit'])->name('medical.edit');
Route::put('/medical/{medical}',[medicalController::class, 'update'])->name('medical.update');




Route::post('/payments', [PaymentController::class, 'store'])->name('payments.store');



