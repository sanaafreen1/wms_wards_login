<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\AddServiceController;
use App\Http\Controllers\Admin\AddSubServiceController;
use App\Http\Controllers\Admin\AddDocumentsController;
use App\Http\Controllers\Admin\LinkDocumentsController;
use App\Http\Controllers\Admin\ReportsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\wards\{BasicDetailsController,FamilyMemersDetailsController,HousedetailsController,EnterServiceDetailsController,ReportController};
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect(url('login'));
});

Route::get('/log-in', function () {
    return redirect(url('login'));
});

//Route::get('/user_loc_details', [UserController::class, 'user_loc_details'])->name('user.ip_location_details');

Auth::routes();

Route::group(['middleware' => 'auth'], function () {

//Admin routes
 Route::get('/home', [HomeController::class, 'index'])->name('home');

//add Service routes
Route::get('/service', [AddServiceController::class, 'service'])->name('service');
Route::post('/service/create', [AddServiceController::class, 'create'])->name('service.create');
Route::get('/service/edit/{id}', [AddServiceController::class, 'edit'])->name('service.edit');
Route::post('/service/update', [AddServiceController::class, 'update'])->name('service.update');
Route::post('/service/delete', [AddServiceController::class, 'delete'])->name('service.delete');
//end add service routes

//add sub service routes
Route::get('/subservice', [AddSubServiceController::class, 'subservice'])->name('subservice');
Route::post('/subservice/create', [AddSubServiceController::class, 'create'])->name('subservice.create');
Route::get('/subservice/edit/{id}', [AddSubServiceController::class, 'edit'])->name('subservice.edit');
Route::post('/subservice/update', [AddSubServiceController::class, 'update'])->name('subservice.update');
Route::post('/subservice/delete', [AddSubServiceController::class, 'delete'])->name('subservice.delete');
//end add sub service routes

//add Document routes
Route::get('/documents', [AddDocumentsController::class, 'documents'])->name('documents');
Route::post('/documents/create', [AddDocumentsController::class, 'create'])->name('documents.create');
Route::get('/documents/edit/{id}', [AddDocumentsController::class, 'edit'])->name('documents.edit');
Route::post('/documents/update', [AddDocumentsController::class, 'update'])->name('documents.update');
Route::post('/documents/delete', [AddDocumentsController::class, 'delete'])->name('documents.delete');
//end add Document routes

//add link doc to ser routes
Route::get('/linkdocument', [LinkDocumentsController::class, 'linkdocument'])->name('linkdocument');
Route::post('/linkdocument/store',[LinkDocumentsController::class,'store'])->name('linkdocument.store');
Route::post('/getsubservice',[LinkDocumentsController::class,'getsubservice'])->name('getsubservice');
Route::post('/linkdocument/delete',[LinkDocumentsController::class,'delete'])->name('linkdocument.delete');
Route::get('/linkdocument/edit/{ser_id}/{sub_id}',[LinkDocumentsController::class,'edit'])->name('linkdocument.edit');
Route::post('/linkdocument/update',[LinkDocumentsController::class,'update'])->name('linkdocument.update');

//end add link doc to ser routes

//report routes
Route::match(['GET','POST'],'/reports', [ReportsController::class, 'reports'])->name('reports');

//end report routes
// end Admin routes

// Wards routes
Route::get('/wards-home', [UserController::class, 'wardshome'])->name('wardshome');

// add basic details routes
Route::get('/wards-addmember', [BasicDetailsController::class, 'wards_add_member'])->name('wards_add_member');
Route::get('/wards-addmember', [BasicDetailsController::class, 'wards_add_member'])->name('wards_add_member');
Route::post('/wards/create', [BasicDetailsController::class, 'create'])->name('wards_add_member.create');
Route::get('/wards_basic_edit/{id}', [BasicDetailsController::class, 'basic_edit'])->name('wards_basic_edit.edit');
Route::post('/basic_details_update', [BasicDetailsController::class, 'update']);



Route::get('wards_reports_edit', [BasicDetailsController::class, 'reports_edit'])->name('wards_reports_edit.edit');


//end basic details routes

// owner house details routes
Route::get('/wards-house', [HousedetailsController::class, 'wards_house_owner'])->name('wards_house_owner');
Route::post('/wards_house_owner/create', [HousedetailsController::class, 'create'])->name('wards_house_owner.insert');
Route::get('/wards_house_edit/{id}', [HousedetailsController::class, 'wards_house_edit'])->name('wards_house_edit');
Route::post('/wards_house/update', [HousedetailsController::class, 'update'])->name('wards_house.update');
// end owner house details routes

// wards-family routes
Route::get('/wards-family', [FamilyMemersDetailsController::class, 'wards_family_member'])->name('wards_family_member');
Route::post('/wardsfamily/create', [FamilyMemersDetailsController::class, 'create'])->name('wards_family_member.create');
Route::get('/wards-family/edit/{id}', [FamilyMemersDetailsController::class, 'edit'])->name('wards_family_member.edit');
Route::post('/wards-family/update', [FamilyMemersDetailsController::class, 'update'])->name('wards_family_member.update');

//end wards-family routes



// enter service details routes
Route::get('/wards-enter', [EnterServiceDetailsController::class, 'wards_enter_service'])->name('wards_enter_service');
Route::post('/wards_enter_service/create', [EnterServiceDetailsController::class, 'create'])->name('wards_enter_service.create');
Route::post('/getsubservice', [EnterServiceDetailsController::class, 'getsubservice'])->name('getsubservice');
Route::get('/enter_service_edit/{id}', [EnterServiceDetailsController::class, 'edit'])->name('enter_service_edit');
Route::get('/enter_service/update', [EnterServiceDetailsController::class, 'update'])->name('enter_service.update');

//end service details routes
// enter reports routes
Route::match(['GET','POST'],'/wards-reports', [ReportController::class, 'wards_reports'])->name('wards_reports');

Route::get('wards_family_report/{id}', [ReportController::class, 'wards_family_report'])->name('wards_family_report');
Route::get('member_full_details/{id}', [ReportController::class, 'member_full_details']);


Route::get('/wards_add_member/edit/{id}', [ReportController::class, 'edit']);
Route::get('wards_reports_edit', [ReportController::class, 'reports_edit'])->name('wards_reports_edit.edit');




// end reports routes
// Route::get('/wards-reports', [UserController::class, 'wards_reports'])->name('wards_reports');

// end ward routes
// Route::get('/wards-addmember/{id}', [ReportController::class, 'wards_add_members'])->name('wards_add_members');

});
// Varsha



// rathnakar code
// shruthi ias

// Rathnakar code



