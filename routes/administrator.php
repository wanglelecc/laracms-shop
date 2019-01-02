<?php
/**
 * LaraCMS - CMS based on laravel
 *
 * @category  LaraCMS
 * @package   Laravel
 * @author    Wanglelecc <wanglelecc@gmail.com>
 * @date      2018/06/06 09:08:00
 * @copyright Copyright 2018 LaraCMS
 * @license   https://opensource.org/licenses/MIT
 * @github    https://github.com/wanglelecc/laracms
 * @link      https://www.laracms.cn
 * @version   Release 1.0
 */

/*
|--------------------------------------------------------------------------
| Administrator Routes
|--------------------------------------------------------------------------
|
| 管理后台相关路由定义
|
*/

/*
 * -------------------------------------------------------------------------
 * 后台需要认证相关路由
 * -------------------------------------------------------------------------
 */
Route::group(['domain' => config('administrator.domain'), 'prefix' => config('administrator.uri').'/shop', 'namespace' => '\Wanglelecc\Laracms\Shop\Http\Controllers\Administrator', 'middleware' => ['laracms.auth'], ], function () {
    
    # 分类相关路由
    Route::get('category','CategoryController@index')->name('administrator.shop.category.index');
    Route::post('category','CategoryController@store')->name('administrator.shop.category.store');
    Route::get('category/create/{parent}','CategoryController@create')->name('administrator.shop.category.create');
    Route::get('category/{category}','CategoryController@show')->name('administrator.shop.category.show');
    Route::get('category/{category}/edit','CategorysController@edit')->name('administrator.shop.category.edit');
    Route::put('category/order','CategoryController@order')->name('administrator.shop.category.order');
    Route::put('category/{category}','CategoryController@update')->name('administrator.shop.category.update');
    Route::delete('category/{category}','CategoryController@destroy')->name('administrator.shop.category.destroy');
    
    
});