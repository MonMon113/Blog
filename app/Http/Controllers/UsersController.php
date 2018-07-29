<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Content;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    public function index(){
        $contents = Content::join('users', 'users.id', '=', 'user_id')
                ->select('contents.*', 'users.name', 'users.url as usersUrl')
                ->where('users.id', '=', Auth::user()->id)
                ->orderBy('created_at', 'desc')
                ->paginate(10);

        return view('myblog', ([
            'contents' => $contents
        ]));
    }
}
