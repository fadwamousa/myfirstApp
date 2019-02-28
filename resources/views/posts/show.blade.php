@extends('layouts.master')
@section('content')

    <div class="row">

      <!-- Blog Entries Column -->
      <div class="col-md-8">
        <h5>Hello Fadwa</h5>
        <h4>Hello Fdawa</h4>

        <h1 class="my-4">Page Heading
          <small>Secondary Text</small>
        </h1>

         <div class="card mb-4">
          <img class="card-img-top" 
               src="{{asset('storage/cover_images/'.$post->cover_image)}}" onerror="this.onerror=null;this.src='storage/cover_images/noimage.jpg'">
          <div class="card-body">
             
            
            <h2 class="card-title">{{$post->title}}</h2>
            <p class="card-text">{{$post->body}}</p>
            <a href="{{url('posts/'.$post->id.'/edit')}}" class="btn btn-primary">Edit &rarr;</a>
            
            <form method="post" action="{{url('/posts/destroy/'.$post->id)}}">
              @csrf
              @method('DELETE')
              <button class="btn btn-danger">Delete &rarr;</button>
              
            </form>
          </div>
          <div class="card-footer text-muted">
            Posted on {{$post->created_at->diffForHumans()}} by
            <a href="">{{$post->user->name}}</a>
          </div>
        
          
       </div>
     
       <div class="comments">
        <div class="well">

          <h3 style="color:red">Comments</h3>

          <form method="POST" action="{{url('/addComment')}}">
            @csrf

            <div class="from-groub">
              <textarea name="comment" rows="5" class="form-control">
                
              </textarea>
            </div>
            <div class="from-groub">
              <button type="submit" class="alert alert-primary">Send</button>
            </div>
            
          </form>
      </div>
    </div>
    <div class="card">

      @foreach($post->comment as $c)
      <h4 style="color:red">{{$c->comment}}</h4>
      <small>{{$c->created_at->diffForHumans()}}</small>
      @endforeach
      
    </div>
    
    </div>
@endsection