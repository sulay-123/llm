<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/promotions', 'ApiController@promotion');
Route::get('/events', 'ApiController@events');
Route::post('/hot-mixes', 'ApiController@hot_mixes');
Route::post('/mixes', 'ApiController@mixes');
Route::get('/biography', 'ApiController@biography');
Route::get('/djs', 'ApiController@djs');
Route::get('/radio','ApiController@radio');
Route::get('/gallery','ApiController@gallery');
Route::get('/videos','ApiController@videos');
Route::get('/sponsors','ApiController@sponsers');
Route::get('/social', 'ApiController@social');
Route::get('/donation_url', 'ApiController@donation_url');
Route::get('/slider_images', 'ApiController@slider_images');
Route::post('/contact_us', 'ApiController@contact_us');
Route::post('dj_songs', 'ApiController@dj_songs');
Route::get('/chat', 'ApiController@chat');
Route::get('/banner_images', 'ApiController@banner_images');
Route::post('/all_songs', 'ApiController@all_songs');
Route::post('/add-favourites', 'ApiController@add_favourites');
Route::post('/remove-favourties', 'ApiController@removeSong');
Route::post('/favourite-songs', 'ApiController@getFavourtieSongs');
Route::post('/register', 'ApiController@register');
Route::post('/show-playlist', 'ApiController@show_playlist');
Route::post('/add-playlist', 'ApiController@add_playlist');
Route::post('/remove-playlist', 'ApiController@removePlaylist');
Route::post('/add-song-to-playlist', 'ApiController@addSongToPlaylist');
Route::post('/playlist-songs', 'ApiController@playlistSongs');
Route::post('/remove-song-from-playlist', 'ApiController@removePlaylistSongs');
Route::get('/category', 'ApiController@category');
Route::post('/category_song', 'ApiController@category_songs');