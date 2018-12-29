<?php
/**
 * LaraCMS - CMS based on laravel
 *
 * @category  LaraCMS
 * @package   Laravel
 * @author    Wanglelecc <wanglelecc@gmail.com>
 * @date      2018/11/08 09:08:00
 * @copyright Copyright 2018 LaraCMS
 * @license   https://opensource.org/licenses/MIT
 * @github    https://github.com/wanglelecc/laracms
 * @link      https://www.laracms.cn
 * @version   Release 1.0
 */

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopProductBaleChildTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_product_bale_child', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('product_bale_id')->comment('打包品 ID');
            $table->foreign('product_bale_id')->references('id')->on('shop_product_bales')->onDelete('cascade');
            $table->unsignedInteger('product_sku_id')->comment('SKU ID');
            $table->foreign('product_sku_id')->references('id')->on('shop_product_skus')->onDelete('cascade');
            $table->unsignedInteger('quantity')->default(0)->comment('数量');
            $table->decimal('price', 10, 2)->comment('商品价格');
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
        Schema::dropIfExists('shop_product_bale_child');
    }
}
