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

class CreateShopBrandTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_brand', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('category_id')->comment('商品类目ID');
            $table->foreign('category_id')->references('id')->on('shop_category')->onDelete('cascade');
            $table->string('name_cn', 128)->comment("品牌中文名称");
            $table->string('name_en', 128)->comment("品牌英文名称");
            $table->string("description")->nullable()->comment('品牌描述');
            $table->string("logo",255)->nullable()->comment('品牌logo');
            $table->string("website",255)->nullable()->comment('官方品牌地址');
            $table->text("content")->comment('品牌故事');
            $table->integer("order")->comment('排序');
            $table->integer("weight")->default(0)->comment("权重");
            $table->string("template")->nullable()->comment('模板');
            $table->enum("top",['0','1'])->default('0')->comment('置顶');
            $table->enum("status",['0','1','2'])->default('1')->comment('状态');
            $table->timestamps();
            $table->softDeletes();
            $table->index('order','order_index');
            $table->index('views','views_index');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_brand');
    }
}
