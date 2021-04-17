@extends('master')

@section('content')
<div class="content-wrapper" style="min-height: 1724.5px;width:1100px;margin-left:0px">
    <div class="card">
      <div class="card-body">
       
        <h3>Edit Teacher</h3>
        <div class="container">
          <form style=""method="POST"action="{{route('teacher.update',$teacher->id)}}"enctype="multipart/form-data">
            @csrf
              <div class="form-group">
                <label for="name">Teacher Name</label>
                <input type="text"value="{{$teacher->name}}" required name="name"class="form-control" id="name" >
              </div>
              <div class="form-group">
                <label for="email">Teacher Email</label>
                <input type="text"value="{{$teacher->email}}" required name="email"class="form-control" id="email" >
              </div>
              <div class="form-group">
                <label for="phone">Teacher Phone</label>
                <input type="number"value="{{$teacher->phone}}" required name="phone"class="form-control" id="phone" >
              </div>
              <div class="form-group">
                <label for="division_id">Division Name</label>
                  <select name="division_id" id="division_id"class="form-control">
                    <option value="">Select Division for the District</option>
                    @foreach ($division as $division )
                    <option value="{{$division->id}}" {{$teacher->division->id == $division->id ? 'selected':''}}>{{$division->name}}</option>
                      
                    @endforeach
                  </select>
              </div>
              <div class="form-group">
                <label for="district_id">District Name</label>
                  <select name="district_id" id="district_id"class="form-control">
                    <option value="">Select District for the Division</option>
                    @foreach ($district as $district )
                    <option value="{{$district->id}}" {{$teacher->district->id == $district->id ? 'selected':''}}>{{$district->name}}</option>
                      
                    @endforeach
                  </select>
              </div>
              <div class="form-group">
                <label for="image">Fiture Image</label>
                <input type="file" required name="image"class="form-control" id="image" >
              </div>
  
              <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control"cols="30" rows="3">{{$teacher->description}}</textarea>
              </div>
             
             
              <button type="submit" class="btn btn-primary">Update</button>
              <a href="{{route('teacher.create')}}"class="btn btn-danger">BACK</a>
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
