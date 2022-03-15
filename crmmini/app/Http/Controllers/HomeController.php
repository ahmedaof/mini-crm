<?php

namespace App\Http\Controllers;

use App\Models\PodCast;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $podcasts = PodCast::get();
        return view('home',['podcasts' => $podcasts]);
    }
    public function show($id)
    {
        $podcast = PodCast::findOrFail($id)->first();
        return view('show',['podcast' => $podcast]);
    }
}
