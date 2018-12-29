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

class CreateShopOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('no' )->unique()->comment('订单流水号');
            $table->unsignedInteger('user_id')->comment('用户ID');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->text('address')->comment('收货地址');
            $table->text('address_id')->comment('收货ID');
            $table->decimal('total_amount', 10, 2)->comment('总金额');
            $table->decimal('free_amount', 10, 2)->default(0)->comment('减免金额');
            $table->enum('is_postage', ['0','1'])->default('0')->comment('是否有邮费:0否,1是');
            $table->decimal('postage_amount', 10, 2)->comment('邮费');
            $table->text('remark')->nullable()->comment('订单备注');
            $table->timestamp('payment_at', 0)->nullable()->comment('付款时间');
            $table->decimal('payment_amount', 10, 2)->comment('实际付款金额');
            $table->string('payment_method')->nullable()->comment('支付方式');
            $table->string('payment_no')->nullable()->comment('支付平台订单号');
            $table->string('refund_status')->nullable()->comment('退款状态');
            $table->string('refund_no')->unique()->nullable()->nullable()->comment('退款单号');
            $table->enum('closed', ['0', '1'])->default('0')->comment('订单是否已关闭:0否,1是');
            $table->enum('reviewed', ['0', '1'])->default('0')->comment('订单是否已评价:0否,1是');
            $table->string('ship', 64)->nullable()->comment('物流类型');
            $table->string('ship_no', 64)->nullable()->comment('物流编号');
            $table->string('ship_status', 64)->nullable()->comment('物流状态');
            $table->json('ship_data')->nullable()->comment('物流数据');
            $table->json('extra')->nullable()->comment('扩展数据');
            $table->string('ip', 64)->comment('买家IP');
            $table->enum('source', ['website', 'webapp', 'wap','app'])->default('website')->comment('交易来源');
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
        Schema::dropIfExists('shop_orders');
    }
}
