<?php

namespace App\Http\Controllers;

use App\Model\Product;
use Faker\Provider\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\File\File;

class ProductController extends Controller
{
	public function create( Request $request ) {

		return view('product.create');
    }

	public function confirm( Request $request ) {

		if ( $request->getMethod() != 'POST' ) {
			return redirect( route( 'product_create' ) );
		}

		$this->validate( $request, [
			'title'    => 'required|min:2',
			'category' => 'required|min:2',
			'price_our' => 'required',
			'price_sell' => 'required',
		] );

		if ($request->file('photo_path')){
			$imagePath = $request->file('photo_path')->store('product');
		}

		$title    = $request->input( 'title' );
		$category = $request->input( 'category' );
		$price_our    = $request->input( 'price_our' );
		$price_sell    = $request->input( 'price_sell' );
		$material    = $request->input( 'material' );
		$size    = $request->input( 'size' );
		$notes    = $request->input( 'notes' );

		Product::create($title, $category, $price_our, $price_sell, $imagePath, $material, $size, $notes);

		$product = Product::getLatest();

		$path = Storage::disk('local')->url($imagePath);


		return view('product.confirm', compact(['product', 'path']));
    }

	public function list(  ) {

		$products = Product::all();

		return view('product.list', compact('products'));
    }

	public function delete( Product $product ) {

		Product::deleteItem( $product->id );

		return redirect( route('product_list') );
    }

	public function update(  ) {

    }
}
