<?php

namespace App\Http\Controllers;

use App\Models\Blog\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\Blog\BlogRepositoryInterface;

class BlogController extends Controller
{
  private $blogReposity;

  public function __construct(BlogRepositoryInterface $blogReposity)
  {
    $this->middleware('auth');
    $this->blogReposity = $blogReposity;
  }

  public function index()
  {
    try {
      //dump(auth()->user()); die;
      $data = $this->blogReposity->get();
      return view('blog.index', compact('data'));
    } catch (\Exception $e) {
      Log::info('Listing Failed');
      return back()->withErrors('Listing Failed');
    }
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
    $file_name = time() . '.' . $request->file('image')->extension();
    // $path  = public_path('images/').$file_name;
    // dd(public_path());
    $request->file('image')->move(public_path('images'), $file_name);

    Blog::create([
      'name' => $request->blog_name,
      'email' => $request->email,
      'description' => $request->description,
      'image' => $file_name
    ]);


    return redirect()->route('blog.index');
  }

  public function edit($id)
  {
    //$data = Blog::where('id', $id)->first();
    $data = $this->blogReposity->getById($id);
    return view('blog.edit', compact('data'));
  }

  public function update(Request $request, $id)
  {
    try {
      $this->blogReposity->update([
        'name' => $request->blog_name,
        'email' => $request->blog_email,
        'description' => $request->blog_description
      ], $id);

      return redirect()->route('blog.index');
    } catch (\Exception $e) {
      return back()->withErrors('Update Failed');
    }

  }

  public function delete($id)
  {

    $data = Blog::where('id', $id)->first();

    $data->delete();
    return back();
  }

}
