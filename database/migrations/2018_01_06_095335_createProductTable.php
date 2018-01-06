<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table){
        	$table->increments('id');
        	$table->string('title');
        	$table->string('category');
        	$table->decimal('price_our');
        	$table->decimal('price_sell');
        	$table->string('material')->nullable();
        	$table->string('size')->nullable();
        	$table->longText('photo_path')->nullable();
        	$table->longText('notes')->nullable();
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
