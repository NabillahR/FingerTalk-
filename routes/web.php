<?php

use Illuminate\Support\Facades\Route;

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

// Home Page - User
Route::get('/', 'LandingController@index')->name('landing');

// Category Page - User
Route::get('/materi/{kategori}', 'LandingController@materi');
Route::get('/materi/{kategori}/{materi}', 'LandingController@gambarMateri');

// About Page - User
Route::get('/about', 'LandingController@about');

// FAQ Page - User
Route::get('/faq', 'LandingController@faqs');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Materi, Sub Materi, Kategori Materi
// View Materi
Route::get('/admin/materi', 'KategoriMateriController@index');
// Add Materi
Route::post('/admin/materi', 'KategoriMateriController@store');
// Add Kategori Materi
Route::post('/admin/materi/kategori', 'KategoriMateriController@storeKategori');
// Add Sub Kategori
Route::post('/admin/materi/kategori/sub', 'KategoriMateriController@storeSubKategori');
// Edit Materi
Route::put('/admin/materi/{id}', 'KategoriMateriController@update');
// Edit Kategori
Route::put('/admin/materi/kategori/{id}', 'KategoriMateriController@updateKategori');
// Edit Sub Kategori
Route::put('/admin/materi/kategori/sub/{id}', 'KategoriMateriController@updateSubKategori');
Route::delete('/admin/materi/{name}', 'KategoriMateriController@destroy');
Route::get('/admin/materi/kategori/{name}/hapus', 'KategoriMateriController@destroyKategori');
Route::delete('/admin/materi/kategori/sub/{name}', 'KategoriMateriController@destroySubKategori');

// FAQ
// View FAQ
Route::get('/admin/faq', 'FAQController@index');
// Add FAQ
Route::post('/admin/faq', 'FAQController@store');
// Edit FAQ
Route::put('/admin/faq/{question}', 'FAQController@update');
// Delete FAQ
Route::delete('/admin/faq/{question}', 'FAQController@destroy');