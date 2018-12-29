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

class CreateShopProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_product', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('category_id')->comment('商品类目ID');
            $table->foreign('category_id')->references('id')->on('shop_category')->onDelete('cascade');
    
            $table->string("alias",150)->nullable()->comment('别名');
            $table->string("title",150)->comment('商品标题');
            $table->string("subtitle",150)->nullable()->comment('副标题');
            $table->string("keywords",150)->nullable()->comment('关键字');
            $table->string("description")->nullable()->comment('描述');
            $table->text("content")->comment('详情');
            $table->string("thumb",255)->nullable()->comment('封面');
    
            $table->enum('is_sale',['0','1'])->default('1')->comment('商品是否正在售卖');
            $table->float('rating')->default(5)->comment('商品平均评分');
            $table->unsignedInteger('sold_count')->default(5)->comment('商品销量');
            $table->unsignedInteger('review_count')->default(5)->comment('评价数量');
            $table->unsignedInteger('weight_count')->default(5)->comment('商品重量');
            $table->decimal('price', 10, 2)->comment('商品SKU最低价格');
            
            $table->integer("order")->default(0)->comment("排序");
            $table->integer("weight")->default(0)->comment("权重");
            $table->string("template")->nullable()->comment('模板');
            $table->text("css")->nullable()->comment('style');
            $table->text("js")->nullable()->comment('javascript');
            $table->enum("top",['0','1'])->default('0')->comment('置顶');
            $table->enum("status",['0','1','2'])->default('1')->comment('状态');
            
            $table->timestamps();
            $table->softDeletes();
            
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
        Schema::dropIfExists('shop_product');
    }
}
