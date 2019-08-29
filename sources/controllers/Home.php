<?php

namespace App\Sources\Controllers;

class Home
{
  public function index()
  {
    return view('home.index')
              ->css('public/css/pages/home.css')
              ->with('title', 'Home');
  }
}
