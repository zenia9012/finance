<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Client extends Model
{
	public static function create( $name, $city, $notes = null, $email = null, $phone = null, $facebook = null ) {

		$client = new Client();

		$client->name = $name;
		$client->city = $city;
		$client->notes = $notes;
		$client->email = $email;
		$client->phone = $phone;
		$client->facebook = $facebook;
		$client->created_at = Carbon::now();
		$client->updated_at = Carbon::now();

		$client->save();
	}

	public static function deleteItem( $id ) {
		Client::where('id', '=', $id)->delete();
	}
}
