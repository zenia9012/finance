<?php

namespace App\Http\Controllers;

use App\Model\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
	public function create( Request $request ) {



		return view('product.create');
    }

	public function list(  ) {

		$products = Product::all();

		return view('product.list', compact('products'));
    }

	public function delete(  ) {

    }

	public function update(  ) {

    }
}
