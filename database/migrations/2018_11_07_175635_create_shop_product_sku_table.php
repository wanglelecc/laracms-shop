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

class CreateShopProductSkuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_product_skus', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('product_id')->comment('商品ID');
            $table->foreign('product_id')->references('id')->on('shop_product')->onDelete('cascade');
    
            $table->unsignedInteger('stock')->default(0)->comment('库存');
            $table->decimal('price', 10, 2)->comment('商品价格');
            $table->string("name",150)->comment('SKU名称');
            $table->string("external_code",128)->nullable()->comment('外部编码');
            $table->string("merchant_code",128)->nullable()->comment('商家编码');
            $table->string("product_code",128)->nullable()->comment('商品条形码');
    
            $table->enum("status",['0','1','2'])->default('1')->comment('状态');
            $table->integer("order")->comment('排序');
            
            $table->timestamps();
            
            $table->index('order','order_index');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_product_skus');
    }
}
