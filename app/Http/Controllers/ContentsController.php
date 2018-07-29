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
            ->update(['subject' => $request->subject], ['content' => $request->content]);
        if($request->hasFile('file')){
            $file = $request->file('file');
            $file->move('images', $file->getClientOriginalName());
            Content::where('id', $request->id)
                ->update(['url' => $file->getClientOriginalName()]);
        }
        return redirect('/myblog');
    }
}
