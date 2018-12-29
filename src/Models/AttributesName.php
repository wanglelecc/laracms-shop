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
 * 类目属性名
 *
 * Class Block
 * @package Wanglelecc\Laracms\Models
 */
class AttributesName extends Model
{
    public $table = 'shop_attributes_name';
    
    protected $fillable = ['id','category_id', 'name', 'is_alias', 'is_color', 'is_enum', 'is_input', 'is_important', 'is_sales', 'is_search', 'is_required', 'is_multiple', 'status', 'order',];

    
}
