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
		    $table->integer('products_id');
		    $table->integer('clients_id');
		    $table->string('deadline');
		    $table->decimal('amount');
		    $table->enum('status', ['new', 'complete', 'cancel']);
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
        Schema::dropIfExists('orders');
    }
}
