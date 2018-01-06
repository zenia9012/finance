<?php

namespace App\Http\Controllers;

use App\Model\Cost;
use Illuminate\Http\Request;

class CostController extends Controller {

	public function create( Request $request ) {

		if ( $request->getMethod() == 'POST' ) {

			$this->validate($request, [
				'title' => 'required|min:2',
				'category' => 'required|min:2',
				'price' => 'required',

			]);

			$title    = $request->input( 'title' );
			$category = $request->input( 'category' );
			$notes    = $request->input( 'notes' );
			$price    = $request->input( 'price' );

			Cost::create( $title, $category, $price, $notes );

			return redirect( route( 'list_cost' ) );
		}

		return view( 'costs.create' );
	}

	public function list() {

		$costs = Cost::all();

		return view( 'costs.list', compact( 'costs' ) );
	}

}
