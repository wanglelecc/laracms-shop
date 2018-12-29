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

class CreateShopCouponTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_coupons', function (Blueprint $table) {
            $table->increments('id');
    
            $table->string('title', '128')->comment('标题');
            $table->string('logo')->nullable()->comment('活动logo');
            $table->string('icon')->nullable()->comment('活动图标');
            $table->string('code')->comment('优惠码');
            $table->enum('type', ['amount', 'percentage'])->comment('类型:amount金额;percentage百分比');
            $table->unsignedInteger('value')->default(0)->comment('折扣值');
            $table->unsignedInteger('total')->default(0)->comment('全站可兑换的数量');
            $table->unsignedInteger('used')->default(0)->comment('全站已兑换的数量');
            $table->decimal('threshold', 10, 2)->comment('阀值');
            $table->timestamp('begin_at', 0)->nullable()->nullable()->comment('开始时间');
            $table->timestamp('end_at', 0)->nullable()->nullable()->comment('结束时间');
            $table->enum("status",['0', '1', '2'])->default('1')->comment('状态');
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
        Schema::dropIfExists('shop_coupons');
    }
}
