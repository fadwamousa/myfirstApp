@extends('layouts.master')
@section('content')
  <div class="row">

      <!-- Blog Entries Column -->
      <div class="col-md-8">

        <h1 class="my-4">Page Heading
          <small style="color:orange">Create Post Now </small>
        </h1>

          <form method="POST" action="{{url('/posts')}}" enctype="multipart/form-data">
            @csrf
              <div class="form-group">
                <label for="exampleInputEmail1">Title</label>
                <input type="text" name="title" class="form-control">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Content</label>
                <textarea name="body" class="form-control"></textarea>
              </div>
              <div class="form-group">
                <input type="file" name="cover_image">
              </div>
               <button type="submit" class="btn btn-primary">Submit</button>
          </form>
          @include('layouts.message')
         
        </div>
       

     

@endsection