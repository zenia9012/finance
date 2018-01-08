<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table){
        	$table->increments('id');
        	$table->integer('product_id')->unsigned();
        	$table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        	$table->integer('client_id')->unsigned();
        	$table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
        	$table->string('deadline');
        	$table->decimal('amount');
        	$table->enum('status', ['new', 'complete', 'cancel']);
        	$table->longText('notes');
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
        Schema::dropIfExists('orders');
    }
}
