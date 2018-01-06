<?php

namespace App\Http\Controllers;

use App\Model\Cost;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CostController extends Controller {

	public function create( Request $request ) {

		if ( $request->getMethod() == 'POST' ) {

			$this->validate( $request, [
				'title'    => 'required|min:2',
				'category' => 'required|min:2',
				'price'    => 'required',

			] );

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

	public function delete( Cost $cost ) {
		Cost::deleteItem( $cost->id );

		return redirect( route( 'list_cost' ) );
	}

	public function update( Cost $cost, Request $request ) {



			$this->validate( $request, [
				'title'    => 'required|min:2',
				'category' => 'required|min:2',
				'price'    => 'required',

			] );

			$title    = $request->input( 'title' );
			$category = $request->input( 'category' );
			$notes    = $request->input( 'notes' );
			$price    = $request->input( 'price' );

			if( $title != null){
				$cost->title = $title;
			}

			if( $category != null){
				$cost->category = $category;
			}

			if( $price != null){
				$cost->price = $price;
			}

			if( $notes != null){
				$cost->notes = $notes . ' редагував ' . $user->name . ' час : ' . Carbon::now() ;
			}else{
				$cost->notes = 'Редагував ' . $user->name . ' час : ' . Carbon::now('+2') ;
			}

			$cost->save();

			return redirect( route( 'list_cost' ) );
		}

		return view('costs.update', compact('cost'));
	}
}
