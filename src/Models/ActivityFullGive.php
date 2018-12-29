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
 * 满减活动
 *
 * Class Block
 * @package Wanglelecc\Laracms\Models
 */
class ActivityFullGive extends Model
{
    public $table = 'shop_activity_full_give';
    
    protected $fillable = ['id','activity_id', 'threshold', 'free_amount', 'is_free_postage', ];
    
}
