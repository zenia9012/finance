<?php

namespace App\Model;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Cost extends Model
{
	public static function create( $title, $category, $price ,$notes = null ) {

		$costs = new Cost();

		$costs->title = $title;
		$costs->category = $category;
		$costs->notes = $notes;
		$costs->price = $price;
		$costs->created_at = Carbon::now();
		$costs->updated_at = Carbon::now();

		$costs->save();
    }
}
