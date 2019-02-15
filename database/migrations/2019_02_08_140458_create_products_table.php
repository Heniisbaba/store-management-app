<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('product_name');
            $table->string('product_images');
            $table->integer('category_id');
            $table->integer('brand_id');
            $table->float('purchase_cost', 10,0)->unsigned()->nullable()->default(0);
            $table->float('selling_price', 10,0)->unsigned()->nullable()->default(0);
            $table->integer('stock_quantity')->default(0);
            $table->string('physical_quantity_units');
            $table->string('physical_quantity');
            $table->unsignedInteger('supplier_id');
            $table->boolean('deleted')->default(0);
            $table->timestamps();
			$table->softDeletes();
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
