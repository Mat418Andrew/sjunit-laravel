<?php
/**
 * Created by PhpStorm.
 * User: mi
 * Date: 2019/7/30/0030
 * Time: 22:16
 */
Route::get('/', 'SJunitController@index');
Route::post('/', 'SJunitController@store')->name('junit.store');


Route::get('test', 'TestController@test');