<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\TermsConditionController;
use App\Http\Controllers\PrivacyController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\ProfileController;

// Frontend Routes Here

Route::get('/', [FrontEndController::class, 'Home'])->name('home');

Route::get('/category/{id}', [FrontEndController::class, 'JobByCategory'])->name('frontedn.category');

Route::get('/job-details/{id}', [FrontEndController::class, 'JobDetails'])->name('job-details');

Route::get('/about', [FrontEndController::class, 'About'])->name('frontend.about');

Route::get('/terms-condition', [FrontEndController::class, 'TermsCondition'])->name('frontend.terms-condition');

Route::get('/privacy', [FrontEndController::class, 'Privacy'])->name('frontend.privacy');

Route::get('/faq', [FrontEndController::class, 'Faq'])->name('frontend.faq');

Route::get('/contact', [FrontEndController::class, 'Contact'])->name('frontend.contact');

Route::post('/contact', [FrontEndController::class, 'Send_Message'])->name('frontend.contact.send_message');

Route::get('/admin', [CustomAuthController::class, 'Login'])->middleware('alreadyLoggedIn');

Route::get('/registration', [CustomAuthController::class, 'Registration'])->middleware('alreadyLoggedIn');

Route::post('/admin-register', [CustomAuthController::class, 'AdminRegister'])->name('auth.admin-register');

Route::post('/admin-login', [CustomAuthController::class, 'AdminLogin'])->name('auth.admin-login');

Route::get('/logout', [CustomAuthController::class, 'Logout'])->name('auth.logout');


Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('isLoggedIn');


// Admin Routes Here


// Admin Routes Here

// Profile

Route::get('/dashboard/profile', [ProfileController::class, 'index'])->name('admin.profile.profile');


// Category 

    Route::get('/dashboard/categories', [CategoryController::class, 'index'])->name('admin.category.categories');
    Route::get('/dashboard/categories/add-category', [CategoryController::class, 'create'])->name('admin.category.add-cat');

    Route::post('/dashboard/categories/add-category', [CategoryController::class, 'store'])->name('admin.category.store-cat');

    Route::get('/dashboard/categories/edit-category/{id}', [CategoryController::class, 'edit'])->name('admin.category.edit-cat');

    Route::put('/dashboard/categories/update-category/{id}', [CategoryController::class, 'update'])->name('admin.category.update-cat');

    Route::get('/dashboard/categories/delete-category/{id}', [CategoryController::class, 'destroy'])->name('admin.category.delete-cat');

   // Jobs 

    Route::get('/dashboard/jobs', [JobController::class,'index'])->name('admin.job.jobs');

    Route::get('/dashboard/add-job', [JobController::class,'create'])->name('admin.job.add-job');

    Route::post('/dashboard/add-job', [JobController::class,'store'])->name('admin.job.store-job');

    Route::get('/dashboard/edit-job/{id}', [JobController::class,'edit'])->name('admin.job.edit-job');

    Route::put('/dashboard/update-job/{id}', [JobController::class,'update'])->name('admin.job.edit-job');

    Route::get('/dashboard/delete-job/{id}', [JobController::class,'destroy'])->name('admin.job.delete-job');


    // About

    Route::get('/dashboard/about', [AboutController::class,'index'])->name('admin.about.about');

    Route::get('/dashboard/about/add-about-info', [AboutController::class,'create'])->name('admin.about.add-about-info');

    Route::post('/dashboard/about/add-about-info', [AboutController::class,'store'])->name('admin.about.add-about-info');

     Route::get('/dashboard/about/edit-about-info/{id}', [AboutController::class,'edit'])->name('admin.about.edit-about-info');

    Route::put('/dashboard/about/update-about-info/{id}', [AboutController::class,'update'])->name('admin.about.update-about-info');

    Route::get('/dashboard/about/delete-about-info/{id}', [AboutController::class,'destroy'])->name('admin.about.delete-about');

    // Terms And Condition

    Route::get('/dashboard/terms-condition', [TermsConditionController::class,'index'])->name('admin.terms-condition.terms-condition');

    Route::get('/dashboard/terms-condition/add-terms-condition', [TermsConditionController::class,'create'])->name('admin.terms-condition.add-terms-condition');

    Route::post('/dashboard/terms-condition/add-terms-condition', [TermsConditionController::class,'store'])->name('admin.terms-condition.add-terms-condition');

     Route::get('/dashboard/terms-condition/edit-terms-condition/{id}', [TermsConditionController::class,'edit'])->name('admin.terms-condition.edit-terms-condition');

    Route::put('/dashboard/terms-condition/update-terms-condition/{id}', [TermsConditionController::class,'update'])->name('admin.terms-condition.update-terms-condition');

    Route::get('/dashboard/terms-condition/delete-terms-condition/{id}', [TermsConditionController::class,'destroy'])->name('admin.terms-condition.delete-terms-condition');

    // Privacy Policy

    Route::get('/dashboard/privacy', [PrivacyController::class,'index'])->name('admin.privacy.privacy');

    Route::get('/dashboard/privacy/add-privacy', [PrivacyController::class,'create'])->name('admin.privacy.add-privacy');

    Route::post('/dashboard/privacy/add-privacy', [PrivacyController::class,'store'])->name('admin.privacy.add-privacy');

     Route::get('/dashboard/privacy/edit-privacy/{id}', [PrivacyController::class,'edit'])->name('admin.privacy.edit-privacy');

    Route::put('/dashboard/privacy/update-privacy/{id}', [PrivacyController::class,'update'])->name('admin.privacy.update-privacy');

    Route::get('/dashboard/privacy/delete-privacy/{id}', [PrivacyController::class,'destroy'])->name('admin.privacy.delete-privacy');


    // FAQ

    Route::get('/dashboard/faq', [FaqController::class,'index'])->name('admin.faq.faq');

    Route::get('/dashboard/faq/add-faq', [FaqController::class,'create'])->name('admin.faq.add-faq');

    Route::post('/dashboard/faq/add-faq', [FaqController::class,'store'])->name('admin.faq.add-faq');

     Route::get('/dashboard/faq/edit-faq/{id}', [FaqController::class,'edit'])->name('admin.faq.edit-faq');

    Route::put('/dashboard/faq/update-faq/{id}', [FaqController::class,'update'])->name('admin.faq.update-faq');

    Route::get('/dashboard/faq/delete-faq/{id}', [FaqController::class,'destroy'])->name('admin.faq.delete-faq');


    // Contact

    Route::get('/dashboard/contact', [ContactController::class, 'index'])->name('admin.contact.contact');

    Route::get('/dashboard/contact/edit-contact/{id}', [ContactController::class, 'edit'])->name('admin.contact.edit-contact');
    Route::put('/dashboard/contact/update-contact/{id}', [ContactController::class, 'update'])->name('admin.contact.update-contact');
    Route::get('/dashboard/contact/delete-contact/{id}', [ContactController::class, 'destroy'])->name('admin.contact.delete-contact');


     // Settings Route

    Route::get('/dashboard/setting', [SettingController::class, 'index'])->name('admin.setting.index');

    Route::get('/dashboard/setting/add-setting', [SettingController::class, 'create'])->name('admin.setting.add-setting');

    Route::post('/dashboard/setting/add-setting', [SettingController::class, 'store'])->name('admin.setting.store-setting');

    Route::get('/dashboard/setting/edit-setting/{id}', [SettingController::class, 'edit'])->name('admin.setting.edit-setting');
   
    Route::post('/dashboard/setting/update-setting/{id}', [SettingController::class, 'update'])->name('admin.setting.update-setting');

    Route::get('/dashboard/setting/delete-setting/{id}', [SettingController::class, 'destroy'])->name('admin.setting.delete-setting');

// Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
//     Route::get('/dashboard',[DashboardController::class, 'index'])->name('dashboard');

// });



