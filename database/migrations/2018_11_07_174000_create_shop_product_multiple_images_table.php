<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopProductMultipleImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_product_multiple_images', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('product_id')->comment('商品ID');
            $table->foreign('product_id')->references('id')->on('shop_product')->onDelete('cascade');
            $table->string("multiple_file_table_type");
            $table->string("field");
            $table->string("position", 32)->default(0)->comment('图片位置');
            $table->enum("is_main",['0','1'])->default('0')->comment('是否主图:0否;1是');
            $table->integer("order")->default(0)->comment("排序");
            $table->string("path",255)->nullable()->comment("路径");
            $table->timestamps();
            $table->index('multiple_file_table_type','multiple_file_table_type_index');
            $table->index('product_id','mproduct_id_index');
            $table->index('field','field_index');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_product_multiple_images');
    }
}
