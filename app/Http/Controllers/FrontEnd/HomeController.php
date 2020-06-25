<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Produto;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;


class HomeController extends Controller
{
    public function index()
    {
      $produtos = Produto::where('publicado','s')->paginate(6);
      return view('frontend.home',compact('produtos'));
    }
}


