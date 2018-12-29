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

class CreateShopActivityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_activitys', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', '128')->comment('标题');
            $table->string('logo')->nullable()->comment('活动logo');
            $table->string('icon')->nullable()->comment('活动图标');
            $table->enum('type', ['give', 'discount', 'coupon'])->comment('类型:give满就送;discount打折;coupon优惠券');
            $table->enum('is_standard', ['0', '1'])->default('1')->comment('是否标准:0否;1是');
            $table->enum('is_super', ['0', '1'])->default('1')->comment('是否允许叠加:0否;1是');
            $table->timestamp('begin_at', 0)->nullable()->nullable()->comment('开始时间');
            $table->timestamp('end_at', 0)->nullable()->nullable()->comment('结束时间');
            $table->enum("status",['0','1','2'])->default('1')->comment('状态');
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
        Schema::dropIfExists('shop_activitys');
    }
}
