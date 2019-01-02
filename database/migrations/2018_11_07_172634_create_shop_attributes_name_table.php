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

class CreateShopAttributesNameTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_attributes_name', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('category_id')->comment('商品类目ID');
            $table->foreign('category_id')->references('id')->on('shop_category')->onDelete('cascade');
            $table->string('name', 128)->comment("属性名");
            $table->enum("is_alias",['0','1'])->default('0')->comment('是否允许别名:0否;1是');
            $table->enum("is_color",['0','1'])->default('0')->comment('是否颜色属性:0否;1是');
            $table->enum("is_enum",['0','1'])->default('0')->comment('是否枚举属性:0否;1是');
            $table->enum("is_input",['0','1'])->default('0')->comment('是否输入属性:0否;1是');
            $table->enum("is_important",['0','1'])->default('0')->comment('是否关键属性:0否;1是');
            $table->enum("is_sales",['0','1'])->default('0')->comment('是否销售属性:0否;1是');
            $table->enum("is_search",['0','1'])->default('0')->comment('是否搜索字段:0否;1是');
            $table->enum("is_required",['0','1'])->default('0')->comment('是否必须:0否;1是');
            $table->enum("is_multiple",['0','1'])->default('0')->comment('是否多选:0否;1是');
            $table->enum("status",['0','1', '2'])->default('1')->comment('状态');
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
        Schema::dropIfExists('shop_attributes_name');
    }
}
