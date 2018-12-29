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

class CreateShopCouponRangeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_coupon_range', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('coupon_id')->comment('优惠券ID');
            $table->foreign('coupon_id')->references('id')->on('shop_coupons')->onDelete('cascade');
            $table->enum('type', ['all', 'category', 'product', 'sku', 'bale'])->comment('类型:all全场;category类目;product商品;sku单品;bale打包品');
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
        Schema::dropIfExists('shop_coupon_range');
    }
}
