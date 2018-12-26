<?php

namespace App\Http\Controllers;
use App\Category;
use Illuminate\Http\Request;
use App\Post;
use Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');

    }

    public function index()
    {
        $data = Post::all();
        return view('post.index') ->with('data',$data);
        //return view('post.index',compact('data',data1));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cat= Category::pluck('title','id')->toArray();
        return view('post.create',compact('cat'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         
        $request->validate([
            'title' => 'required|max:50',
            'body' =>'required',
            'featured_img' =>'mimes:jpeg,bmp,jpg,png',
        ]);

        $data = new Post();
        $data->title=$request->get('title');
        $data->body=$request->get('body');
        $data->cat_id=$request->get('category');
        $data->user_id=Auth::id();

        if($request->hasFile('featured_img')){
            $image = $request->file('featured_img');
            $filename = time() . '.'. $image->getClientOriginalExtension();
            $path = public_path('image/');
            $image ->move($path, $filename);        
            $data->featured_img = $filename;
        } 
        $data->save();
        return redirect()->route('post.index')->with('status','create successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Post::findorfail($id);
        return view('post.show')->with('data',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Post::findorfail($id);
        $cat= Category::pluck('title','id')->toArray();

        $cats= key(Category::where('id',$data->cat_id)->pluck('title','id')->toArray());
        
        return view('post.edit',compact('data','cat','cats'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $request->validate([
            'title' => 'required|max:50',
            'body' =>'required',
            'featured_img' =>'mimes:jpeg,bmp,jpg,png',
        ]);
        $data = Post::findorfail($id);
        $data->title=$request->get('title');
        $data->body=$request->get('body');
        $data->cat_id=$request->get('category');
        $data->user_id=Auth::id();

        if($request->hasFile('featured_img')){
            $image = $request->file('featured_img');
            $filename = time() . '.'. $image->getClientOriginalExtension();
            $path = public_path('image/');
            $image ->move($path, $filename);        
            $data->featured_img = $filename;
        } 
        $data->save();
        return redirect()->route('post.index')->with('status','create successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Post::findorfail($id);
        $data->delete();
        return redirect()->route('post.index')->with('status','Deleted successfully');


    }
}
