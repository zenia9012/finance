<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Order extends Model
{
	const STATUS_CANCEL = 'cancel';
	const STATUS_COMPLETE = 'complete';

	public function client(  ) {
		$this->hasOne(Client::class);
    }

	public function products(  ) {
		$this->hasOne(Product::class,'id', 'products_id');
    }

	public static function create( $product, $client, $deadline, $amount, $status, $notes = null ) {

		$orders = new Order();

		$orders->products_id = $product;
		$orders->clients_id = $client;
		$orders->amount = $amount;
		$orders->status = $status;
		$orders->deadline = $deadline;
		$orders->notes = $notes;
		$orders->created_at = Carbon::now();
		$orders->updated_at = Carbon::now();

		$orders->save();
	}

	public static function cancel( $id ) {
		$order = Order::where('id', '=', $id)->first();
		$order->status = self::STATUS_CANCEL;
		$order->save();
	}

	public static function complete( $id ) {
		$order = Order::where('id', '=', $id)->first();
		$order->status = self::STATUS_COMPLETE;
		$order->save();
	}
}
