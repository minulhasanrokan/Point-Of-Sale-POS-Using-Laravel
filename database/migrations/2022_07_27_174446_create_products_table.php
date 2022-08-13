<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->integer('cat_id');
            $table->integer('supplier_id');
            $table->string('product_code');
            $table->string('product_place');
            $table->string('product_route');
            $table->string('product_image')->nullable();
            $table->string('buy_date');
            $table->string('expire_date');
            $table->string('buying_price');
            $table->string('sale_price');
            $table->text('product_des')->nullable();
            $table->boolean('status')->default(1);
            $table->boolean('product_status')->default(1);
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
        Schema::dropIfExists('products');
    }
}
