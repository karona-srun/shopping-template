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
            $table->uuid('id')->primary();
            $table->string('category_id');
            $table->string('sub_category_id');
            $table->text('title_kh');
            $table->text('title_en');
            $table->longText('content_kh');
            $table->longText('content_en');
            $table->float('price');
            $table->float('sale_price');
            $table->tinyInteger('qty');
            $table->tinyInteger('rate');
            $table->string('promote');
            $table->boolean('status');
            $table->text('thumbnail')->nullable();
            $table->string('keywords')->nullable();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
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
