<?php

namespace App\Http\Controllers;

use App\Model\Client;
use App\Model\Order;
use App\Model\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
	public function list(  ) {

		$orders = Order::all();

		return view('order.list', compact('orders'));
    }

	public function create( Request $request ) {

		$products = Product::all();
		$clients = Client::all();

		if ( $request->getMethod() == 'POST' ) {

			$this->validate( $request, [
				'product'    => 'required',
				'client' => 'required',
				'amount'    => 'required',
				'deadline'    => 'required',
				'status'    => 'required',

			] );

			$product    = $request->input( 'product' );
			$client = $request->input( 'client' );
			$amount = $request->input( 'amount' );
			$deadline    = $request->input( 'deadline' );
			$status    = $request->input( 'status' );
			$notes    = $request->input( 'notes' );

			Order::create( $product, $client, $deadline, $amount, $status, $notes );

			return redirect( route( 'order_list' ) );
		}

		return view('order.create', compact(['products', 'clients']));
    }

	public function update(  ) {
		
    }

	public function delete(  ) {
		
    }
}
