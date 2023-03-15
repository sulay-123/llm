<?php

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
use Illuminate\Support\Facades\Route;
use App\Events\Message;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Chat;

Route::post('/send_message', function(Request $request){
    date_default_timezone_set('US/Eastern');
    $chat = new Chat;
    $chat->username = $request->username;
    $chat->message = $request->message;
    $chat->date = date('h:i A d M Y');
    $chat->save();

    event(
        new Message(
            $request->username,
            $request->message,
            date('h:i A d M Y')
        )
        ); 
        return ['success' => $chat];
});


Route::get('/','DashboardController@website');

// Route::get('/', function(){
//     return 'Under development';
// });

Route::get('/admin', function () {
    return view('login');
})->name('signin');

Route::get('/logout', 'DashboardController@logout')->name('logout');
Route::post('/login', 'DashboardController@login')->name('login');
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/dashboard', 'DashboardController@dashboard')->name('dashboard');

    Route::group(['prefix' => 'notification'], function(){
        Route::get('/','NotificationController@index')->name('Notification');
        Route::get('/add','NotificationController@add')->name('Notification.add');
        Route::post('/save','NotificationController@save')->name('Notification.save');
        Route::get('/delete/{id}','NotificationController@delete')->name('Notification.delete');
    });

    Route::group(['prefix' => 'player'], function () {
        Route::get('/', 'CategoryController@index')->name('player');
        Route::get('/add', 'CategoryController@add')->name('add.category');
        Route::post('/save', 'CategoryController@save')->name('category.save');
        Route::get('/edit/{id}', 'CategoryController@edit')->name('category.edit');
        Route::post('/update', 'CategoryController@update')->name('category.update');
        Route::get('/delete/{id}', 'CategoryController@delete')->name('category.delete');
    });

    Route::group(['prefix' => 'radio'], function () {
        Route::get('/', 'CategoryController@radio_index')->name('radio');
        Route::post('/save', 'CategoryController@radio_save')->name('radio.save');
    });

    Route::group(['prefix' => 'sponsers'], function () {
        Route::get('/', 'SponserController@index')->name('sponser');
        Route::get('/add', 'SponserController@add')->name('add.sponser');
        Route::post('/save', 'SponserController@save')->name('sponser.save');
        Route::get('/edit/{id}', 'SponserController@edit')->name('sponser.edit');
        Route::post('/update', 'SponserController@update')->name('sponser.update');
        Route::get('/delete/{id}', 'SponserController@delete')->name('sponser.delete');
    });

    Route::group(['prefix' => 'podcast'], function () {
        Route::get('/', 'VideoController@index')->name('video');
        Route::get('/add', 'VideoController@add')->name('add.video');
        Route::post('/save', 'VideoController@save')->name('video.save');
        Route::get('/edit/{id}', 'VideoController@edit')->name('video.edit');
        Route::post('/update', 'VideoController@update')->name('video.update');
        Route::get('/delete/{id}', 'VideoController@delete')->name('video.delete');
    });

    Route::group(['prefix' => 'songs'], function () {
        Route::get('/', 'SongsController@index')->name('song');
        Route::get('/add', 'SongsController@add')->name('add.song');
        Route::post('/save', 'SongsController@save')->name('song.save');
        Route::get('/edit/{id}', 'SongsController@edit')->name('song.edit');
        Route::post('/update', 'SongsController@update')->name('song.update');
        Route::get('/delete/{id}', 'SongsController@delete')->name('song.delete');
    });

    Route::group(['prefix' => 'dj'], function () {
        Route::get('/', 'DjController@index')->name('dj');
        Route::get('/add', 'DjController@add')->name('add.dj');
        Route::post('/save', 'DjController@save')->name('save.dj');
        Route::get('/edit/{id}', 'DjController@edit')->name('dj.edit');
        Route::post('/update', 'DjController@update')->name('dj.update');
        Route::get('/delete/{id}', 'DjController@delete')->name('dj.delete');
    });

    Route::group(['prefix' => 'category'], function () {
        Route::get('/', 'CategoriesController@index')->name('category');
        Route::get('/add', 'CategoriesController@add')->name('add.category');
        Route::post('/save', 'CategoriesController@save')->name('save.category');
        Route::get('/edit/{id}', 'CategoriesController@edit')->name('category.edit');
        Route::post('/update', 'CategoriesController@update')->name('category.update');
        Route::get('/delete/{id}', 'CategoriesController@delete')->name('category.delete');
    });

    Route::group(['prefix' => 'events'], function () {
        Route::get('/', 'EventsController@index')->name('events');
        Route::get('/add', 'EventsController@add')->name('add.events');
        Route::post('/save', 'EventsController@save')->name('events.save');
        Route::get('/edit/{id}', 'EventsController@edit')->name('events.edit');
        Route::post('/update', 'EventsController@update')->name('events.update');
        Route::get('/delete/{id}', 'EventsController@delete')->name('events.delete');
    });

    Route::group(['prefix' => 'gallery'], function () {
        Route::get('/', 'GalleryController@index')->name('gallery');
        Route::get('/add', 'GalleryController@add')->name('add.gallery');
        Route::post('/save', 'GalleryController@save')->name('save.gallery');
        Route::get('/edit/{id}', 'GalleryController@edit')->name('edit.gallery');
        Route::post('/update', 'GalleryController@update')->name('update.gallery');
        Route::get('/delete/{id}', 'GalleryController@delete')->name('delete.gallery');
    });

    Route::group(['prefix' => 'promotion'], function () {
        Route::get('/', 'PromotionController@index')->name('promotion');
        Route::get('/add', 'PromotionController@add')->name('add.promotion');
        Route::post('/save', 'PromotionController@save')->name('save.promotion');
        Route::get('/edit/{id}', 'PromotionController@edit')->name('edit.promotion');
        Route::post('/update', 'PromotionController@update')->name('update.promotion');
        Route::get('/delete/{id}', 'PromotionController@delete')->name('delete.promotion');
    });

    Route::group(['prefix' => 'slider-images'], function () {
        Route::get('/', 'SliderImagesController@index')->name('slider_images');
        Route::get('/add', 'SliderImagesController@add')->name('add.slider_images');
        Route::post('/save', 'SliderImagesController@save')->name('save.slider_images');
        Route::get('/edit/{id}', 'SliderImagesController@edit')->name('edit.slider_images');
        Route::post('/update', 'SliderImagesController@update')->name('update.slider_images');
        Route::get('/delete/{id}', 'SliderImagesController@delete')->name('delete.slider_images');
    });

    Route::group(['prefix' => 'banner-images'], function () {
        Route::get('/', 'BannerImagesController@index')->name('banner_images');
        Route::get('/add', 'BannerImagesController@add')->name('add.banner_images');
        Route::post('/save', 'BannerImagesController@save')->name('save.banner_images');
        Route::get('/edit/{id}', 'BannerImagesController@edit')->name('edit.banner_images');
        Route::post('/update', 'BannerImagesController@update')->name('update.banner_images');
        Route::get('/delete/{id}', 'BannerImagesController@delete')->name('delete.banner_images');
    });

    Route::group(['prefix' => 'radio-slider'], function () {
        Route::get('/', 'RadioSliderController@index')->name('radio_slider');
        Route::get('/add', 'RadioSliderController@add')->name('add.radio_slider');
        Route::post('/save', 'RadioSliderController@save')->name('save.radio_slider');
        Route::get('/edit/{id}', 'RadioSliderController@edit')->name('edit.radio_slider');
        Route::post('/update', 'RadioSliderController@update')->name('update.radio_slider');
        Route::get('/delete/{id}', 'RadioSliderController@delete')->name('delete.radio_slider');
    });

    Route::group(['prefix' => 'social'], function () {
        Route::get('/', 'DashboardController@social_link')->name('social_media');
        Route::post('/update', 'DashboardController@save_socail_link')->name('social_media.update');
    });

    Route::group(['prefix' => 'contactus'], function () {
        Route::get('/', 'ContactUsController@index')->name('contactus');
        Route::get('/delete/{id}', 'ContactUsController@delete')->name('contactus.delete');
    });

    Route::group(['prefix' => 'biography'], function () {
        Route::get('/', 'BiographyController@biography')->name('biography');
        Route::post('/update', 'BiographyController@save_biography')->name('update.biography');
    });

    Route::group(['prefix' => 'fans'], function () {
        Route::get('/', 'FanController@index')->name('fan');
        Route::get('/edit/{id}', 'FanController@edit')->name('edit.fan');
        Route::post('/update', 'FanController@update')->name('fan.update');
    });

    Route::get('/delete_chat', function() {
        Chat::whereNotNull('id')->delete();
        return redirect()->route('dashboard');
    })->name('clear_chat');
});
