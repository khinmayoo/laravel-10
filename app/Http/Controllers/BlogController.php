<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
       public function index()
       {
         $data = Blog::all();
         return view('blog.index',compact('data'));
       }

       public function create()
       {
         return view('blog.create');
       }

       public function store(Request $request)
       {
             Blog::create([
                'name' =>  $request->blog_name
             ]);

             return redirect()->route('blog.index');
       }

       public function edit($id)
       {
        $data = Blog::where('id',$id)->first();
        return view('blog.edit',compact('data'));
       }

       public function update(Request $request,$id)
       {

         $data = Blog::where('id',$id)->first();

         $data->update([
            'name' =>  $request->blog_name
         ]);

         return redirect()->route('blog.index');
       }

}
