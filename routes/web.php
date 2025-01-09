<?php

use App\Http\Controllers\Category_item;
use App\Http\Controllers\Category_item_controller;
use App\Http\Controllers\Mycontroller;
use App\Http\Controllers\PDFcontroller;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [Mycontroller::class, 'Home'])->name('home')->middleware('auth');
// Route::get('/', [Mycontroller::class, 'Home'])->name('home');



// for registering user 
Route::get('/register', [MyController::class, 'register'])->name('register');
Route::post('/register', [MyController::class, 'register_data'])->name('register_data');

// for login user
Route::get('/login', [MyController::class, 'login'])->name('login');
// Route::view('login','Layout/login')->name('login');
Route::post('/login', [MyController::class, 'login_data'])->name('login_data');

// for logout main admin
Route::get('/logout', [MyController::class, 'logout'])->name('logout');



// add category
Route::get('add_category', [Mycontroller::class, 'add_category'])->name('add_category')->middleware('auth');
Route::POST('add_category', [Mycontroller::class, 'Add_new_category'])->name('Add_new_category')->middleware('auth');

// print category pdf  
Route::get('print_pdf_category/{id}',[PDFcontroller::class,'print_pdf_category'])->name('print_pdf_category');

// delete category
Route::delete('delete_category/{id}', [Mycontroller::class, 'delete_category'])->name('delete_category')->middleware('auth');


// add new Add_product in category
Route::get('Add_product/{id}', [Mycontroller::class, 'Add_product'])->name('Add_product')->middleware('auth');
Route::POST('Add_product', [Mycontroller::class, 'add_items'])->name('Add_product.submit')->middleware('auth');

Route::get('add_category', [Mycontroller::class, 'add_category'])->name('add_category')->middleware('auth');
Route::POST('add_category', [Mycontroller::class, 'add_category1'])->name('Add_category')->middleware('auth');


// view _product in store dashboard
Route::get('View_product/{id}', [Mycontroller::class, 'View_product'])->name('View_product')->middleware('auth');


// back from Back_from_category_view;
Route::get('Back_from_category_view', [Mycontroller::class, 'Back_from_category_view'])->name('Back_from_category_view')->middleware('auth');



// edit_category_item
Route::get('edit_category_item/{id}', [Category_item_controller::class, 'edit_category_item'])->name('edit_category_item')->middleware('auth');

Route::patch('edit_category_item/{id}', [Category_item_controller::class, 'edit_category_item_submit'])->name('edit_category_item.submit')->middleware('auth');


Route::delete('delete_category_item/{id1}/{id2}', [Category_item_controller::class, 'delete_category_item'])->name('delete_category_item')->middleware('auth');


// for testing purpose
Route::get('test/{id}', [Mycontroller::class, 'test'])->name('test');


//  for searching in the navbar
Route::get('/search', [Mycontroller::class, 'search'])->name('search');