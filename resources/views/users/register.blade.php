@extends('layouts.master')
@section('content')
  
<div class="row">

      <!-- Blog Entries Column -->
      <div class="col-md-8">

        <h1 class="my-4">Page Heading
          <small style="color:red">Create Account</small>
        </h1>

        <form method="POST" action="{{url('/register')}}">
        	@csrf
          	<div class="form-group">
			    <label for="exampleInputEmail1">UserName</label>
			    <input type="text" 
			           name="name"
			           class="form-control"
			           placeholder="Enter userName">
    
            </div>
		  <div class="form-group">
		    <label for="exampleInputEmail1">Email address</label>
		    <input type="email" value="{{old('email')}}" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
		    
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Password</label>
		    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
		  </div>
		  
          <button type="submit" class="btn btn-primary">Submit</button>
</form>
          @include('layouts.message')
         
        </div>
@endsection