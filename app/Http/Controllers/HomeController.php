<?php

namespace App\Http\Controllers;

use App\SwapiUser;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function apiSwapi()
    {
        $swapi_users = SwapiUser::paginate(10);
        return response()->json($swapi_users);
    }

    public function welcome()
    {
        return view('welcome');
    }
}
