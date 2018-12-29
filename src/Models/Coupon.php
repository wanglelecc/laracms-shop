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
 * 优惠券
 *
 * Class Block
 * @package Wanglelecc\Laracms\Models
 */
class Coupon extends Model
{
    public $table = 'shop_coupons';
    
    protected $fillable = ['id','title', 'logo', 'icon', 'type', 'value', 'total', 'used', 'threshold', 'begin_at', 'end_at', 'status', ];
    
}
