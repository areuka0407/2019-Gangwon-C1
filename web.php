<?php

use App\Route;

Route::get("/", "MainController@index");

/**
 * BIMOS 2019
 */

Route::get("/festival-info", "MainController@info");
Route::get("/festival-history", "MainController@history");

/**
 * User
 */
Route::get("/users/login", "UserController@login" ,"guest");
Route::post("/users/login", "UserController@act_login" ,"guest");
Route::get("/users/join", "UserController@join", "guest");
Route::post("/users/join", "UserController@act_join", "guest");
Route::get("/users/logout", "UserController@act_logout", "user");


/**
 * Admin
 */

 Route::get("/admin/site-manage", "AdminController@siteManage", "admin");
 Route::post("/admin/site-manage", "AdminController@act_siteManage", "admin");

Route::redirect();