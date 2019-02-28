@extends('layouts.master')
@section('content')

    <div class="row">

      <!-- Blog Entries Column -->
      <div class="col-md-8">

        <h1 class="my-4">Page Heading
          <small>Secondary Text</small>
        </h1>
        @if(session()->has('message'))
          <h3 style="color:red;font-family:25px ">{{session()->get('message')}}
          {{session()->forget('message')}}
          </h3>
        @endif
        @if(session()->has('userCreate'))
              <h3 style="color:red;font-family:25px ">  
                {{session()->get('userCreate')}}
                {{session()->forget('userCreate')}}
              </h3>
        @endif
        @if(session()->has('logout'))
              <h3 style="color:red;font-family:25px ">  
                {{session()->get('logout')}}
                {{session()->forget('logout')}}
              </h3>
        @endif
        

         <div class="card mb-4">    
          @foreach($posts as $post)
          <img class="card-img-top" 
               src="{{asset('storage/cover_images/'.$post->cover_image)}}" onerror="this.onerror=null;this.src='storage/cover_images/noimage.jpg'">
          <div class="card-body">
            <h2 class="card-title"><a href="{{url('/posts/'.$post->id)}}">{{$post->title}}</a></h2>
            <p class="card-text">{{$post->body}}</p>
            <a href="{{url('/posts/'.$post->id)}}" class="btn btn-primary">Read More &rarr;</a>
          </div>
          <div class="card-footer text-muted">
            Posted on {{$post->created_at}} by
            
          </div>
          @endforeach
          
              
        </div>
        <!-- Pagination -->
        <ul class="pagination justify-content-center mb-4">
          <li class="page-item">
            {{$posts->render()}}
          </li>
          
        </ul>

      </div>

      

@endsection