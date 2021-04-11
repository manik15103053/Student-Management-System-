@extends('master')

@section('content')
<div class="content-wrapper" style="min-height: 1724.5px;width:1100px;margin-left:0px">
    <div class="card">
      <div class="card-body">
       
        <h3>Edit Class</h3>
        <div class="container">
            <form style="width:60%"method="POST"action=""enctype="multipart/form-data">
                @csrf
                  <div class="form-group">
                    <label for="name">Class Name</label>
                    <input type="text" required name="name"class="form-control" id="name" >
                  </div>
                  <div class="form-group">
                    <label for="name">Description</label>
                    <textarea class="form-control"name="description" id="description" cols="30" rows="3"></textarea>
                  </div>
               
                 
                 
                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>
        </div>
                  
           
              
          
        </div>
      </div>
    </div>
  </div>


@endsection
@push('js')

@endpush
