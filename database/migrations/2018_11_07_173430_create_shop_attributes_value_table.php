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

class CreateShopAttrbutesVlaueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_attributes_value', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('category_id')->comment('商品类目ID');
            $table->foreign('category_id')->references('id')->on('shop_category')->onDelete('cascade')->comment('商品类目ID');
            $table->unsignedInteger('attributes_name_id')->comment('属性名ID');
            $table->foreign('attributes_name_id')->references('id')->on('shop_attributes_name')->onDelete('cascade');
            
            $table->string('name', 128)->comment("属性名称");
            $table->enum("status",['0','1','2'])->default('1')->comment('状态');
            $table->integer("order")->comment('排序');
            
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
        Schema::dropIfExists('shop_attributes_value');
    }
}
