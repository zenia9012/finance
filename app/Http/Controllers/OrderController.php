<?php

namespace App\Http\Controllers;

use App\Model\Client;
use App\Model\Order;
use App\Model\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller {
	public function list() {

		$orders = Order::all();

		return view( 'order.list', compact( 'orders' ) );
	}

	public function create( Request $request ) {

		$products = Product::all();
		$clients  = Client::all();

		if ( $request->getMethod() == 'POST' ) {

			$this->validate( $request, [
				'product'  => 'required',
				'client'   => 'required',
				'amount'   => 'required',
				'deadline' => 'required',
				'status'   => 'required',
			] );

			$product  = $request->input( 'product' );
			$client   = $request->input( 'client' );
			$amount   = $request->input( 'amount' );
			$deadline = $request->input( 'deadline' );
			$status   = $request->input( 'status' );
			$notes    = $request->input( 'notes' );

			Order::create( $product, $client, $deadline, $amount, $status, $notes );

			return redirect( route( 'order_list' ) );
		}

		return view( 'order.create', compact( [ 'products', 'clients' ] ) );
	}

	public function update( Order $order, Request $request ) {

		$product = Product::getById( $order->products_id );
		$client = Client::getById( $order->clients_id );


		if ( $request->getMethod() == 'POST' ) {
			$user = Auth::user();

			$this->validate( $request, [
				'product'  => 'required',
				'client'   => 'required',
				'amount'   => 'required',
				'deadline' => 'required',
				'status'   => 'required',
			] );


			$amount   = $request->input( 'amount' );
			$deadline = $request->input( 'deadline' );
			$status   = $request->input( 'status' );
			$notes    = $request->input( 'notes' );

			if ( $amount != null ) {
				$order->amount = $amount;
			}

			if ( $deadline != null ) {
				$order->deadline = $deadline;
			}

			if ( $status != null ) {
				$order->status = $status;
			}

			if ( $notes != null ) {
				$order->notes = $notes . ' редагував ' . $user->name . ' час : ' . Carbon::now();
			} else {
				$order->notes = 'Редагував ' . $user->name . ' час : ' . Carbon::now();
			}

			$order->save();

			return redirect( route( 'order_list' ) );
		}

		return view( 'order.update', compact( [ 'order', 'product', 'client' ] ) );
	}

	public function delete( Order $order ) {

		Order::cancel( $order->id );

		return redirect( route( 'order_list' ) );
	}

	public function complete( Order $order ) {

		Order::complete( $order->id );

		return redirect( route( 'order_list' ) );
	}
}
