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
 * Reserve
 */

 Route::get("/reserve", "ReserveController@reserve", "user");
 Route::post("/reserve", "ReserveController@act_reserve", "user");

 Route::get("/reserve/cancel/{r_id}", "ReserveController@cancel_reserve");
 Route::get("/reserve/graph/{e_id}", "ReserveController@graph_reserve");

 /**
  * Booth Map
  */
Route::get("/booth-map", "MainController@boothMap");


/**
 * Admin
 */

 Route::get("/admin/site-manage", "AdminController@siteManage", "admin");
 Route::post("/admin/site-manage", "AdminController@act_siteManage", "admin");

 Route::get("/admin/booth-application", "AdminController@application", "company");
 Route::post("/admin/booth-application", "AdminController@act_application", "company");

 /**
  * API
  */

Route::post("/api/take-booth/by-event/{e_id}", "AdminController@takeBoothByEvent");

Route::redirect();