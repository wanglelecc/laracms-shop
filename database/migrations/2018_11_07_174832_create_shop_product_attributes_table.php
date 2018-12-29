<?php
/**
 * LaraCMS - CMS based on laravel
 *
 * @category  LaraCMS
 * @package   Laravel
 * @author    Wanglelecc <wanglelecc@gmail.com>
 * @date      2018/11/06 09:08:00
 * @copyright Copyright 2018 LaraCMS
 * @license   https://opensource.org/licenses/MIT
 * @github    https://github.com/wanglelecc/laracms
 * @link      https://www.laracms.cn
 * @version   Release 1.0
 */

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopProductAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_product_attributes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('product_id')->comment('商品ID');
            $table->foreign('product_id')->references('id')->on('shop_product')->onDelete('cascade');
            $table->unsignedInteger('attributes_name_id')->comment('商品属性名ID');
            $table->foreign('attributes_name_id')->references('id')->on('shop_attributes_name')->onDelete('cascade');
            $table->unsignedInteger('attributes_value_id')->comment('商品属性值ID');
            $table->foreign('attributes_value_id')->references('id')->on('shop_attributes_value')->onDelete('cascade');
            $table->string("value")->comment('输入属性值');
            $table->enum("is_sku",['0','1'])->default('0')->comment('是否SKU:0否;1是');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_product_attributes');
    }
}
