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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/blog', 'Blog@index') -> name('blog');

Route::get('/blog/register', 'Blog@register' ) -> name('blog.register');
Route::post('/blog/register_action', 'Blog@register_action' ) -> name('blog.register_action');

Route::get('/blog/login', 'Blog@login' ) -> name('blog.login');
Route::post('/blog/login_action', 'Blog@login_action' ) -> name('blog.login_action');
Route::get('/blog/logout', 'Blog@logout' ) -> name('blog.logout');

Route::get('/blog/post', 'Blog@post' ) -> name('blog.post');
Route::get('/blog/post/{blog_id}', 'Blog@post' ) -> name('blog.update_post');
Route::post('/blog/post_action', 'Blog@post_action' ) -> name('blog.post_action');
Route::post('/blog/post_action/{blog_id}', 'Blog@post_action' ) -> name('blog.update_post_action');

