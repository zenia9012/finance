<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Order extends Model
{
	public function client(  ) {
		$this->hasOne(Client::class, 'id', 'client_id');
    }

	public function product(  ) {
		$this->hasOne(Product::class, 'id', 'product_id');
    }

	public static function create( $product, $client, $deadline, $amount, $status, $notes = null ) {

		$orders = new Order();

		$orders->product_id = $product;
		$orders->client_id = $client;
		$orders->amount = $amount;
		$orders->status = $status;
		$orders->deadline = $deadline;
		$orders->notes = $notes;
		$orders->created_at = Carbon::now();
		$orders->updated_at = Carbon::now();

		$orders->save();
	}

	public static function deleteItem( $id ) {
		Order::where('id', '=', $id)->delete();
	}
}
