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

	public function create(  ) {

	}

	public function update(  ) {

	}

	public function delete(  ) {

	}
}
