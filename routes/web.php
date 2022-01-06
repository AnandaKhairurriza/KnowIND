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

Route::get('/', ['as' => 'home', 'uses' => 'KnowINDController@home']);

Route::get('/event', ['as' => 'event', 'uses' => 'KnowINDController@event']);
Route::get('/event/{id}', ['as' => 'event-detail', 'uses' => 'KnowINDController@eventdetail']);
Route::get('/list-kontributor', ['as' => 'list-kontributor', 'uses' => 'KnowINDController@listkontributor']);
Route::get('/donasi', ['as' => 'donasi', 'uses' => 'KnowINDController@donasi']);
Route::get('/app-update', ['as' => 'app-update', 'uses' => 'KnowINDController@appupdate']);
Route::get('/app-update/{id}', ['as' => 'app-update-detail', 'uses' => 'KnowINDController@appupdatedetail']);
Route::get('/tentang-kami', ['as' => 'tentang-kami', 'uses' => 'KnowINDController@tentangkami']);
Route::get('/manage-database', ['middleware' => 'kontributor', 'as' => 'manage-database', 'uses' => 'KnowINDController@managedatabase']);

//AUTH
Auth::routes();

Route::get('/edit-akun', ['middleware' => 'kontributor', 'as' => 'edit-akun', 'uses' => 'KnowINDController@editakun']);
Route::post('/update-akun', ['as' => 'update-akun', 'uses' => 'KnowINDController@updateakun']);
Route::post('/update-password', ['as' => 'update-password', 'uses' => 'KnowINDController@updatepassword']);

Route::get('/login-sukses', 'AuthController@loginsukses');
Route::get('/daftar-akun', ['as' => 'daftar-akun', 'uses' => 'AuthController@daftarakun']);
Route::get('/reset-email', ['as' => 'reset-email', 'uses' => 'AuthController@resetemail']);

//CRUD
Route::get('/manage-database/input-artikel', ['middleware' => 'kontributor', 'as' => 'input-artikel', 'uses' => 'ArtikelController@inputartikel']);
Route::post('/upload-artikel', ['as' => 'upload-artikel', 'uses' => 'ArtikelController@uploadartikel']);
Route::get('/manage-database/edit-artikel/{id}', ['middleware' => 'admin', 'as' => 'edit-artikel', 'uses' => 'ArtikelController@editartikel']);
Route::post('/update-artikel-{id}', ['as' => 'update-artikel', 'uses' => 'ArtikelController@updateartikel']);
Route::get('/hapus_artikel-{id}', ['middleware' => 'admin', 'as' => 'hapus-artikel', 'uses' => 'ArtikelController@hapusartikel']);

Route::get('/manage-database/input-podcast', ['middleware' => 'kontributor', 'as' => 'input-podcast', 'uses' => 'PodcastController@inputpodcast']);
Route::post('/upload-podcast', ['as' => 'upload-podcast', 'uses' => 'PodcastController@uploadpodcast']);
Route::get('/manage-database/edit-podcast/{id}', ['middleware' => 'admin', 'as' => 'edit-podcast', 'uses' => 'PodcastController@editpodcast']);
Route::post('/update-podcast-{id}', ['as' => 'update-podcast', 'uses' => 'PodcastController@updatepodcast']);
Route::get('/hapus_podcast-{id}', ['middleware' => 'admin', 'as' => 'hapus-podcast', 'uses' => 'PodcastController@hapuspodcast']);

Route::get('/manage-database/input-video', ['middleware' => 'kontributor', 'as' => 'input-video', 'uses' => 'VideoController@inputvideo']);
Route::post('/upload-video', ['as' => 'upload-video', 'uses' => 'VideoController@uploadvideo']);
Route::get('/manage-database/edit-video/{id}', ['middleware' => 'admin', 'as' => 'edit-video', 'uses' => 'VideoController@editvideo']);
Route::post('/update-video-{id}', ['as' => 'update-video', 'uses' => 'VideoController@updatevideo']);
Route::get('/hapus_video-{id}', ['middleware' => 'admin', 'as' => 'hapus-video', 'uses' => 'VideoController@hapusvideo']);

Route::get('/manage-database/input-event', ['middleware' => 'kontributor', 'as' => 'input-event', 'uses' => 'EventController@inputevent']);
Route::post('/upload-event', ['as' => 'upload-event', 'uses' => 'EventController@uploadevent']);
Route::get('/manage-database/edit-event/{id}', ['middleware' => 'admin', 'as' => 'edit-event', 'uses' => 'EventController@editevent']);
Route::post('/update-event-{id}', ['as' => 'update-event', 'uses' => 'EventController@updateevent']);
Route::get('/hapus_event-{id}', ['middleware' => 'admin', 'as' => 'hapus-event', 'uses' => 'EventController@hapusevent']);

Route::get('/manage-database/input-kosakata', ['middleware' => 'kontributor', 'as' => 'input-kosakata', 'uses' => 'KosakataController@inputkosakata']);
Route::post('/upload-kosakata', ['as' => 'upload-kosakata', 'uses' => 'KosakataController@uploadkosakata']);
Route::get('/manage-database/edit-kosakata/{id}', ['middleware' => 'admin', 'as' => 'edit-kosakata', 'uses' => 'KosakataController@editkosakata']);
Route::post('/update-kosakata-{id}', ['as' => 'update-kosakata', 'uses' => 'KosakataController@updatekosakata']);
Route::get('/hapus_kosakata-{id}', ['middleware' => 'admin', 'as' => 'hapus-kosakata', 'uses' => 'KosakataController@hapuskosakata']);

Route::get('/manage-database/input-kalimat', ['middleware' => 'kontributor', 'as' => 'input-kalimat', 'uses' => 'KalimatController@inputkalimat']);
Route::post('/upload-kalimat', ['as' => 'upload-kalimat', 'uses' => 'KalimatController@uploadkalimat']);
Route::get('/manage-database/edit-kalimat/{id}', ['middleware' => 'admin', 'as' => 'edit-kalimat', 'uses' => 'KalimatController@editkalimat']);
Route::post('/update-kalimat-{id}', ['as' => 'update-kalimat', 'uses' => 'KalimatController@updatekalimat']);
Route::get('/hapus_kalimat-{id}', ['middleware' => 'admin', 'as' => 'hapus-kalimat', 'uses' => 'KalimatController@hapuskalimat']);

Route::get('/manage-database/input-update', ['middleware' => 'admin', 'as' => 'input-update', 'uses' => 'UpdateController@inputupdate']);
Route::post('/upload-update', ['as' => 'upload-update', 'uses' => 'UpdateController@uploadupdate']);
Route::get('/manage-database/edit-update/{id}', ['middleware' => 'admin', 'as' => 'edit-update', 'uses' => 'UpdateController@editupdate']);
Route::post('/update-update-{id}', ['as' => 'update-update', 'uses' => 'UpdateController@updateupdate']);
Route::get('/hapus_update-{id}', ['middleware' => 'admin', 'as' => 'hapus-update', 'uses' => 'UpdateController@hapusupdate']);

Route::get('/manage-database/input-hotel', ['middleware' => 'kontributor', 'as' => 'input-hotel', 'uses' => 'HotelController@inputhotel']);
Route::post('/upload-hotel', ['as' => 'upload-hotel', 'uses' => 'HotelController@uploadhotel']);
Route::get('/manage-database/edit-hotel/{id}', ['middleware' => 'admin', 'as' => 'edit-hotel', 'uses' => 'HotelController@edithotel']);
Route::post('/update-hotel-{id}', ['as' => 'update-hotel', 'uses' => 'HotelController@updatehotel']);
Route::get('/hapus_hotel-{id}', ['middleware' => 'admin', 'as' => 'hapus-hotel', 'uses' => 'HotelController@hapushotel']);

Route::get('/manage-database/input-wisata', ['middleware' => 'kontributor', 'as' => 'input-wisata', 'uses' => 'WisataController@inputwisata']);
Route::post('/upload-wisata', ['as' => 'upload-wisata', 'uses' => 'WisataController@uploadwisata']);
Route::get('/manage-database/edit-wisata/{id}', ['middleware' => 'admin', 'as' => 'edit-wisata', 'uses' => 'WisataController@editwisata']);
Route::post('/update-wisata-{id}', ['as' => 'update-wisata', 'uses' => 'WisataController@updatewisata']);
Route::get('/hapus_wisata-{id}', ['middleware' => 'admin', 'as' => 'hapus-wisata', 'uses' => 'WisataController@hapuswisata']);

//Route::get('/home', 'HomeController@index')->name('home');

Route::get('google', 'Auth\LoginController@redirectToGoogle');
Route::get('google/callback', 'Auth\LoginController@handleGoogleCallback');