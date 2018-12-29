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

class CreateShopActivityFullGiveTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 满就送模型
        Schema::create('shop_activity_full_give', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('activity_id')->comment('活动ID');
            $table->foreign('activity_id')->references('id')->on('shop_activitys')->onDelete('cascade');
            $table->decimal('threshold', 10, 2)->comment('阀值');
            $table->decimal('free_amount', 10, 2)->default(0)->comment('减免金额');
            $table->enum('is_free_postage', ['0', '1'])->default('1')->comment('是否免运费:0否;1是');
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
        Schema::dropIfExists('shop_activity_full_give');
    }
}
