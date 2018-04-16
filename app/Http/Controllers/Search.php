<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Search extends Controller
{
  public function getResults()
	{
		return view('search');
	}
}
