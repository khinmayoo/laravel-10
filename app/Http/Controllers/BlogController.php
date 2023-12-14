<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

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
           $request->validate(
             [
                'blog_name' => 'required',
                'email' => 'required|unique:blogs',
                'image' => 'required|file'
             ]
           );

        //    dd($request->all());
            //$name = $request->file('image')->getClientOriginalName();
            // dd('hello.'.$request->file('image')->extension());
            $file_name = time().'.'.$request->file('image')->extension();
            // $path  = public_path('images/').$file_name;
            // dd(public_path());
            $request->file('image')->move(public_path('images'),$file_name);

             Blog::create([
                'name' =>  $request->blog_name,
                'email' => $request->email,
                'description' => $request->description,
                'image' => $file_name
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

       public function delete($id)
       {

            $data = Blog::where('id',$id)->first();

            $data->delete();
            return back();
       }

}
