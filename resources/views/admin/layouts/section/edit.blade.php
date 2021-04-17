@extends('master')

@section('content')
<div class="content-wrapper" style="min-height: 1724.5px;width:1100px;margin-left:0px">
    <div class="card">
      <div class="card-body">
       
        <h3>Edit Section</h3>
        <div class="container">
            <form style="width:60%"method="POST"action="{{route('update.section',$section->id)}}"enctype="multipart/form-data">
                @csrf
                  <div class="form-group">
                    <label for="name">Section Name</label>
                    <input type="text"value="{{$section->name}}" required name="name"class="form-control" id="name" >
                  </div>
                  <div class="form-group">
                    <label for="name">Description</label>
                    <textarea class="form-control"name="description" id="description" cols="30" rows="3">{{$section->description}}</textarea>
                  </div>
               
                 
                 
                  <button type="submit" class="btn btn-primary">Update</button>
                  <a href="{{route('section.create')}}"class="btn btn-danger">BACK</a>
                </form>
        </div>
                  
           
              
          
        </div>
      </div>
    </div>
  </div>


@endsection
@push('js')

@endpush
