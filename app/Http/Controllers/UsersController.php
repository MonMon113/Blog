<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Content;
use App\User;
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

    public function profile(){
        return view('profile');
    }

    protected function update(Request $request) {
        if ($request->password === $request->password_confirmation && $request->password != Null) {
            User::where('id', Auth::id())
                ->update(['password' => bcrypt($request->password)]);
        }

        User::where('id', Auth::id())
            ->update (['date_of_birth' => $request->date_of_birth]);

        User::where('id', Auth::id())
            ->update (['sex' => $request->sex]);

        if($request->hasFile('file')){
            $file = $request->file('file');
            $file->move('images', $file->getClientOriginalName());
            User::where('id', Auth::id())
                ->update(['url' => $file->getClientOriginalName()]);
        }
        return redirect('/profile');
    }
}
