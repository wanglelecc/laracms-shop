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

echo 'tttttttttttttttttttttttt'; exit;

if( !function_exists("shop_backend_view") ){
    /**
     * 后台 view 加载函数
     *
     * @author lele.wang <lele.wang@raiing.com>
     * @param $name
     * @return mixed
     */
    function shop_backend_view($name)
    {
        $args = func_get_args();
        $args[0] = 'backend.shop::'.$name;
        
        return view(...$args);
    }
}


if( !function_exists("shop_frontend_view") ){
    /**
     * 前台view加载函数
     *
     * @author lele.wang <lele.wang@raiing.com>
     * @param $name
     * @return mixed
     */
    function shop_frontend_view($name)
    {
        $args = func_get_args();
        $args[0] = 'frontend.shop::'.$name;
        
        return view(...$args);
    }
}