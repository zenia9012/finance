<?php

namespace App\Http\Controllers;

use App\Model\Client;
use Illuminate\Http\Request;

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

			
			Client::create($name, $city, $notes);

			return redirect( route('client_list') );
		}

		return view('client.create');
	}

	public function update(  ) {

	}

	public function delete(  ) {

	}
}
