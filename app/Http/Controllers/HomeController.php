<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Content;
use Illuminate\Support\Facades\DB;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contents = Content::join('users', 'users.id', '=', 'user_id')
                ->select('contents.*', 'users.name', 'users.url as usersUrl')
                ->orderBy('created_at', 'desc')
                ->paginate(10);

        return view('home', ([
            'contents' => $contents
        ]));
    }
}
