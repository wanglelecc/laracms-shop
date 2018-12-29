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

class CreateShopOrderRevieweTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_order_reviewes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('order_id');
            $table->foreign('order_id')->references('id')->on('shop_orders')->onDelete('cascade');
            $table->unsignedInteger('product_id')->comment('商品ID');
            $table->foreign('product_id')->references('id')->on('shop_product')->onDelete('cascade');
            $table->unsignedInteger('product_sku_id')->comment('商品SKU ID');
            $table->foreign('product_sku_id')->references('id')->on('shop_product_skus')->onDelete('cascade');
            $table->decimal('rating', 1, 2)->default(5)->comment('评分');
            $table->string('review')->nullable()->comment('评价');
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
        Schema::dropIfExists('shop_order_reviewes');
    }
}
