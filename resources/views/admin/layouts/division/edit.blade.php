@extends('master')

@section('content')
<div class="content-wrapper" style="min-height: 1724.5px;width:1100px;margin-left:0px">
    <div class="card">
      <div class="card-body">
       
        <h3>Edit Division</h3>
        <div class="container">
            <form style="width:60%"method="POST"action="{{route('division.update',$division->id)}}">
                @csrf
                  <div class="form-group">
                    <label for="name">Division Name</label>
                    <input type="text"value="{{$division->name}}" required name="name"class="form-control" id="name" >
                  </div>
                  <div class="form-group">
                    <label for="priority">Priority</label>
                    <input type="text"value="{{$division->priority}}" required name="priority"class="form-control" id="priority" >

                  </div>
               
                 
                 
                  <button type="submit" class="btn btn-primary">Update</button>
                  <a href="{{route('division.create')}}"class="btn btn-danger">BACK</a>
                </form>
        </div>
                  
           
              
          
        </div>
      </div>
    </div>
  </div>

</div>
@endsection
@push('js')

@endpush
