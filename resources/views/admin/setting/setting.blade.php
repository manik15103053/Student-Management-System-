@extends('master')

@section('content')
<div class="content-wrapper" style="min-height: 1724.5px;width:1100px;margin-left:0px">
    <div class="card">
      <div class="card-body">
       
        <h3>Update Profiles</h3>
        <div class="container">
            <form style="width:60%"method="POST"action=""enctype="multipart/form-data">
                @csrf
                  <div class="form-group">
                    <label for="username">User Name</label>
                    <input type="text" value="{{$user->username}}"required name="username"class="form-control" id="username" >
                  </div>
                  <div class="form-group">
                    <label for="name">email</label>
                    <input type="email" value="{{$user->email}}"required name="email"class="form-control" id="email" >
                  </div>
                  
                  <div class="form-group">
                    <label for="password">Image</label>
                    <input type="file"name="image"class="form-control">
                  </div>
                  
               
                 
                 
                  <button type="submit" class="btn btn-primary">Update</button>
                </form>
        </div>
                  
           
              
          
        </div>
      </div>
    </div>
  </div>


@endsection
@push('js')

@endpush
