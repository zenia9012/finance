<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CostController extends Controller
{
	public function create( Request $request ) {



		return view('costs.create');
    }

}
