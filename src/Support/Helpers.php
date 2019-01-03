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

use Illuminate\Support\Arr;
use Illuminate\Support\Str;

if( !function_exists("backend_shop_view") ){
    /**
     * 后台 view 加载函数
     *
     * @author lele.wang <lele.wang@raiing.com>
     * @param $name
     * @return mixed
     */
    function backend_shop_view($name)
    {
        $args = func_get_args();
        $args[0] = 'backend.shop::'.$name;
        
        return view(...$args);
    }
}


if( !function_exists("frontend_shop_view") ){
    /**
     * 前台view加载函数
     *
     * @author lele.wang <lele.wang@raiing.com>
     * @param $name
     * @return mixed
     */
    function frontend_shop_view($name)
    {
        $args = func_get_args();
        $args[0] = 'frontend.shop::'.$name;
        
        return view(...$args);
    }
}