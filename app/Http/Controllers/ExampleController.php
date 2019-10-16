<?php

namespace App\Http\Controllers;

class ExampleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index(){
        return response()->json([
            'success' => true,
            'massege' => 'Welcome TO Lumen REST API'
        ]);
    }
}
