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

class CreateShopCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_category', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->comment("类目名称");
            $table->string('alias')->nullable()->default(null)->comment("别名");
            $table->integer("parent")->default(0)->comment('父id');
            $table->integer("order")->default(99)->comment('排序');
            $table->string('path')->comment("路径");
            $table->enum("is_parent", ['0','1'])->default('0')->comment('是否父级:0否,1是');
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
        Schema::dropIfExists('shop_category');
    }
}
