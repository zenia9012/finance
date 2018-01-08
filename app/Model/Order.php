<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	public function client(  ) {
		$this->hasOne(Client::class, 'id', 'client_id');
    }

	public function product(  ) {
		$this->hasOne(Product::class, 'id', 'product_id');
    }
}
