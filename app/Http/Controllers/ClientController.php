<?php

namespace App\Http\Controllers;

use App\Model\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
	public function list(  ) {

		$clients = Client::all();

		return view('client.list', compact('clients'));
	}

	public function create( Request $request ) {

		if ( $request->getMethod() == 'POST' ){
			$this->validate($request, [
				'name' => 'required|min:2',
				'city' => 'required|min:2'
			]);

			$name = $request->input('name');
			$city = $request->input('city');
			$notes = $request->input('notes');
			$email = $request->input('email');
			$phone = $request->input('phone');
			$facebook = $request->input('facebook');


			Client::create($name, $city, $notes, $email, $phone, $facebook);

			return redirect( route('client_list') );
		}

		return view('client.create');
	}

	public function update( Client $client, Request $request ) {

		if ( $request->getMethod() == 'POST' ) {

			$user = Auth::user();

			$this->validate( $request, [
				'name'    => 'required|min:2',
			] );

			$name    = $request->input( 'name' );
			$city = $request->input( 'city' );
			$email    = $request->input( 'email' );
			$phone    = $request->input( 'phone' );
			$facebook    = $request->input( 'facebook' );
			$notes    = $request->input( 'notes' );

			if( $name != null){
				$client->name = $name;
			}

			if( $city != null){
				$client->city = $city;
			}

			if( $email != null){
				$client->email = $email;
			}

			if( $phone != null){
				$client->phone = $phone;
			}

			if( $facebook != null){
				$client->facebook = $facebook;
			}

			if( $notes != null){
				$client->notes = $notes . ' редагував ' . $user->name . ' час : ' . Carbon::now() ;
			}else{
				$client->notes = 'Редагував ' . $user->name . ' час : ' . Carbon::now(  ) ;
			}

			$client->save();

			return redirect( route( 'client_list' ) );
		}

		return view('client.update', compact('client'));
	}

	public function delete( Client $client ) {
		Client::deleteItem( $client->id );

		return redirect( route('client_list'));
	}
}
