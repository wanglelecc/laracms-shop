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

namespace Wanglelecc\Laracms\Shop\Models;

/**
 * 优惠券使用范围
 *
 * Class Block
 * @package Wanglelecc\Laracms\Models
 */
class CouponRange extends Model
{
    public $table = 'shop_coupon_range_items';
    
    protected $fillable = ['id','range_id', 'range_id', 'value', ];
    
}
