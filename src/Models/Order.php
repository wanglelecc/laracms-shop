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
 * 订单表
 *
 * Class Block
 * @package Wanglelecc\Laracms\Models
 */
class Order extends Model
{
    public $table = 'shop_orders';
    
    protected $fillable = ['id','user_id', 'address', 'total_amount', 'free_amount', 'is_postage', 'postage_amount', 'remark', 'payment_at', 'payment_amount', 'payment_method', 'payment_no', 'refund_status', 'refund_no', 'closed', 'reviewed', 'ship', 'ship_no', 'ship_status', 'ship_data', 'extra', 'ip', 'source'];
    
}
