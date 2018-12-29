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

class CreateShopActivityDiscountTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 限时打折模型
        Schema::create('shop_activity_discount', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('activity_id')->comment('活动ID');
            $table->foreign('activity_id')->references('id')->on('shop_activitys')->onDelete('cascade');
            $table->unsignedInteger('discount')->default(0)->comment('折扣');
            $table->unsignedInteger('amount')->default(0)->comment('限购数量');
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
        Schema::dropIfExists('shop_activity_discount');
    }
}
