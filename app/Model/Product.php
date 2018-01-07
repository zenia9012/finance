<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	public static function create( $title, $category, $price_our, $price_sell, $photo_path = null, $material = null, $size = null, $notes = null ) {

		$product = new Product();

		$product->title  = $title;
		$product->category  = $category;
		$product->price_our  = $price_our;
		$product->price_sell  = $price_sell;
		$product->material  = $material;
		$product->size  = $size;
		$product->notes  = $notes;
		$product->photo_path  = $photo_path;

		$product->save();
    }

	public static function getLatest(  ) {
		return Product::orderBy('id', 'desc')->first();
    }

	public static function deleteItem( $id ) {
		Product::where('id', '=', $id)->delete();
	}
}
