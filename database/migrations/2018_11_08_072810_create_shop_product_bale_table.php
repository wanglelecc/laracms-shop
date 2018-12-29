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

class CreateShopProductBaleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_product_bales', function (Blueprint $table) {
            $table->increments('id');
            $table->string("name",150)->comment('名称');
            $table->enum("type", ['0','1'])->default('0')->comment('类型:0组合;1单品SKU');
            $table->enum("is_cross_brand", ['0','1'])->default('0')->comment('是否跨品牌:0否;1是');
            $table->enum("status", ['0','1','2'])->default('1')->comment('状态');
            $table->string("key_code",128)->nullable()->comment('打包品Key');
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
        Schema::dropIfExists('shop_product_bales');
    }
}
