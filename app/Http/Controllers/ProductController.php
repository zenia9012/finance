<?php

namespace App\Http\Controllers;

use App\Model\Product;
use Faker\Provider\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
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
		}else{
			$imagePath = null;
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

	public function update( Product $product, Request $request ) {

		if ( $request->getMethod() == 'POST' ) {

			$user = Auth::user();

			$this->validate( $request, [
				'title'    => 'required|min:2',
				'category' => 'required|min:2',
				'price_our'    => 'required',
				'price_sell'    => 'required',
			] );

			$title    = $request->input( 'title' );
			$category = $request->input( 'category' );
			$price_our    = $request->input( 'price_our' );
			$price_sell    = $request->input( 'price_sell' );
			$material    = $request->input( 'material' );
			$size    = $request->input( 'size' );
			$notes    = $request->input( 'notes' );

			if( $title != null){
				$product->title = $title;
			}

			if( $category != null){
				$product->category = $category;
			}

			if( $price_our != null){
				$product->price_our = $price_our;
			}

			if( $price_sell != null){
				$product->price_sell = $price_sell;
			}

			if( $material != null){
				$product->material = $material;
			}

			if( $size != null){
				$product->size = $size;
			}

			if ($request->file('photo_path')){
				$imagePath = $request->file('photo_path')->store('product');
				$product->photo_path = $imagePath;
			}

			if( $notes != null){
				$product->notes = $notes . ' редагував ' . $user->name . ' час : ' . Carbon::now() ;
			}else{
				$product->notes = 'Редагував ' . $user->name . ' час : ' . Carbon::now() ;
			}

			$product->save();

			return redirect( route( 'product_list' ) );
		}

		return view('product.update', compact('product'));
    }
}
