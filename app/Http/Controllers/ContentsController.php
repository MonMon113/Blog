<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Content;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ContentsController extends Controller
{
    public function subjectDelete($content_id){
        Content::findOrFail($content_id)->delete();
    
        return redirect('/myblog');
    }

    public function subjectEdit($content_id){
        $sub = Content::where('id', '=', $content_id)
            ->get();
        return view('editBlog', ([
            'sub' => $sub
        ]));
    }

    public function contentEdit(Request $request){
        Content::where('id', $request->id)
            ->update(['subject' => $request->subject]);
        Content::where('id', $request->id)
        ->update(['content' => $request->content]);
        if($request->hasFile('file')){
            $file = $request->file('file');
            $file->move('images', $file->getClientOriginalName());
            Content::where('id', $request->id)
                ->update(['url' => $file->getClientOriginalName()]);
        }
        return redirect('/myblog');
    }

    public function newblog(){
        return view('/newblog');
    }

    public function add(Request $request){
        $content = new Content;
        $content->subject = $request->subject;
        $content->content = $request->content;
        $content->user_id = Auth::id();
        if($request->hasFile('file')){
            $file = $request->file('file');
            $file->move('images', $file->getClientOriginalName());
            $content->url = $file->getClientOriginalName();
        }
        $content->save();
        return redirect('/myblog');
    }

    public function detail($content_id){
        $content = Content::join('users', 'users.id', '=', 'user_id')
                ->where('contents.id', '=', $content_id)
                ->select('contents.*', 'users.name', 'users.url as usersUrl')
                ->orderBy('created_at', 'desc')
                ->get();
        return view('detail', ([
            'content' => $content
        ]));
    }
}
