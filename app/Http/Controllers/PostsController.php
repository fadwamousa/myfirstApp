<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use DB;
use App\Post;
class PostsController extends Controller
{
    public function __construct(){
        $this->middleware('auth',['except'=>['index','show']]);
    }
    public function index(){
    	$posts = DB::table('posts')->latest()->paginate(5);
    	return view('posts.index')->with('posts',$posts);
    }
    public function show($id){

    	$post = Post::find($id);
    	return view('posts.show',compact('post'));

    }

    public function create(){
    	return view('posts.create');
    }

    public function store(Request $request){

    	//validate data 
    	$this->validate(request(),[
             'title'=>'bail|required|max:255',
             'body'=>'required',
             'is_published'=>'nullable|numeric|max:1',
             'cover_image'=>'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
             ]);
        //bail when the first validating fail it will stop validtion rules not complete the rules.

        if($request->hasFile('cover_image')){
            //Git file name with Ext
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();

            //Git FileName 
            $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
            
            //Git the Extension

            $ext = $request->file('cover_image')->getClientOriginalExtension();

            //filename to store
            $fileNameToStore = $filename.time().'.'.$ext;

            //upload Image
            $path = $request->file('cover_image')->storeAs('public/cover_images/',$fileNameToStore);



        }else{
            $fileNameToStore = 'noimage.jpg';
        }
    
    	//store data
    	
        $post = new Post;
        $post->title = $request->input('title');
        $post->body  = $request->input('body');
        $post->cover_image = $fileNameToStore;
        $post->user_id = auth()->user()->id;
        $post->save();

    	//redirect 
        //session()->flash('message','The Post Is Created');
        session()->put('message','The Post Is Created');
    	return redirect('/posts');

    }

    public function edit($id){
    	$post = Post::find($id);
    	return view('posts.edit',['post'=>$post]);
    }

    public function update(Request $request,$id){

    	//validate
    	$this->validate(request(),[
            'title'=>'bail|required',
            'body'=>'required',
            'cover_image'=>'nullable|image|max:1999']);
        

        if($request->hasFile('cover_image')){
            //Git file name with Ext
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();

            //Git FileName 
            $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
            
            //Git the Extension

            $ext = $request->file('cover_image')->getClientOriginalExtension();

            //filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$ext;

            //upload Image
            $path = $request->file('cover_image')->storeAs('public/cover_images/',$fileNameToStore);



        }else{
            $fileNameToStore = 'noimage.jpg';
        }
    	//store Data
    	$post = Post::find($id);
    	$post->title = $request->input('title');
    	$post->body  = $request->input('body');
         if($request->hasFile('cover_image')){
            $post->cover_image = $fileNameToStore;
         }
    	$post->save();

    	//redirect 
    	return redirect('/posts');

    }

    public function destroy($id){

    	$post = Post::find($id)->delete();
         
         //delete the image from folder when deleteing post
        if($post->cover_image != 'noimage.jpg'){

            Storage::delete('public/cover_images/'.$post->cover_image);

        }

    	return redirect('/posts');

    }

}
