<?php

namespace App\Http\Controllers;

use App\Model\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
	public function list(  ) {

		$orders = Order::all();

		return view('order.list', compact('orders'));
    }

	public function create(  ) {
		
    }

	public function update(  ) {
		
    }

	public function delete(  ) {
		
    }
}
