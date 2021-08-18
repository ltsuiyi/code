<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
use think\facade\Route;


Route::group('api',function(){

    Route::get('getLandList', 'Land/getList');    /*土地列表*/
    Route::get('LandType', 'Land/getPageList');    /*土地类型*/
    Route::get('LatinType', 'Land/LatinList');     /*土地流转类型*/

    Route::get('getFarmerList', 'Farmer/getList');    /*农机列表*/
    Route::get('FarmerType', 'Farmer/getPageList');    /*农机类型*/
    Route::get('ServiceType', 'Farmer/LatinList');     /*农机服务类型*/

    Route::get('test', 'Farmer/LatinList');     /*农机服务类型*/
    
    
     Route::get('demo', 'Farmer/LatinList');     /*农机服务类型*/

});

