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

class CreateShopOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_order_items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('no' )->unique()->comment('订单流水号');
            $table->unsignedInteger('order_id');
            $table->foreign('order_id')->references('id')->on('shop_orders')->onDelete('cascade');
            $table->unsignedInteger('product_id')->comment('商品ID');
            $table->foreign('product_id')->references('id')->on('shop_product')->onDelete('cascade');
            $table->unsignedInteger('product_sku_id');
            $table->foreign('product_sku_id')->references('id')->on('shop_product_skus')->onDelete('cascade');
            $table->unsignedInteger('amount')->comment('数量');
            $table->decimal('price', 10, 2)->comment('单价');
            $table->decimal('total_amount', 10, 2)->comment('总价');
            $table->decimal('actual_total_amount', 10, 2)->comment('实付总金额');
            $table->unsignedInteger('bale_id')->nullable()->comment('打包品ID');
            $table->foreign('bale_id')->references('id')->on('shop_product_bales')->onDelete('cascade');
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
        Schema::dropIfExists('shop_order_items');
    }
}
