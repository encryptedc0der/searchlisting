<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloWorld extends Controller
{
  public function index()
  {
    $content = array ('title' => 'Hello World');
    return view('helloworld', $content);
  } 
}
