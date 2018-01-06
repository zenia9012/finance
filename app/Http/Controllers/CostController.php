<?php

namespace App\Http\Controllers;

use App\Model\Cost;
use Illuminate\Http\Request;

class CostController extends Controller
{
	public function create( Request $request ) {

		if ($request->getMethod() == 'POST'){
			$title = $request->input('title');
			$category = $request->input('category');
			$notes = $request->input('notes');
			$price = $request->input('price');

			Cost::create( $title, $category, $price, $notes);

			return redirect('list_costs');
		}

		return view('costs.create');
    }

}
