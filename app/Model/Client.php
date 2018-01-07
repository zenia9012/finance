<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Client extends Model
{
	public static function create( $name, $city, $notes = null ) {

		$costs = new Client();

		$costs->name = $name;
		$costs->city = $city;
		$costs->notes = $notes;
		$costs->created_at = Carbon::now();
		$costs->updated_at = Carbon::now();

		$costs->save();
	}

	public static function deleteItem( $id ) {
		Client::where('id', '=', $id)->delete();
	}
}
