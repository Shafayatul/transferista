<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function FirstLogin(Request $request)  {

      if ($request->typ == "transferista") {

        return view('usertransferista');

      } elseif ($request->typ == "b2c") {

        return view('userprivate');

      } elseif ($request->typ == "b2b") {

        return view('usercompany');

      }


    }
}
