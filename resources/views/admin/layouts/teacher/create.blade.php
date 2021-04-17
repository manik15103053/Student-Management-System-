@extends('master')

@section('content')
<div class="content-wrapper" style="min-height: 1724.5px;width:1100px;margin-left:0px">
    <div class="card">
      <div class="card-body">
        @if ($errors->any())
               
          @foreach ($errors->all() as $error)
              <p class="btn btn-danger">{{ $error }}</p>
          @endforeach
  
        @endif
        @if(Session::has('msg'))
        <div class="alert alert-primary">
            {{ Session::get('msg') }}
        </div>
        @endif
        <a href=""class="btn btn-info"data-bs-toggle="modal" data-bs-target="#exampleModal">Add New Teacher</a>
       
        <h3>Teacher List</h3>
        <div class="container">
          <table class="table table-hover table-striped">
            <thead>
              <tr>
                <th>Sl</th>
                <th>Name.</th>
                <th>Eamil</th>
                <th>Phone.</th>
                <th>Image.</th>
                <th>Division.</th>
                <th>District.</th>
                <th>action</th>
              </tr>
            </thead>
            <tbody>
        
             @foreach ($teachers as $key=>$teacher)
             <tr>
               <td>{{$key + 1}}</td>
               <td>{{$teacher->name}}</td>
               <td>{{$teacher->email}}</td>
               <td>{{$teacher->phone}}</td>
               <td>
                 <img src="{{asset('images/teacher/'.$teacher->image)}}" width="40" alt="{{$teacher->image}}">
               </td>
               <td>{{$teacher->division->name}}</td>
               <td>{{$teacher->district->name}}</td>
               <td>
                 <a href="{{route('teacher.edit',$teacher->id)}}"class="btn btn-primary">Edit</a>
                 <a href="{{route('teacher.delete',$teacher->id)}}"class="btn btn-danger">Delete</a>
               </td>
             </tr>
               
             @endforeach
                
         
            
            
            </tbody>
          </table>
        </div>
                  
           
              
          
        </div>
      </div>
    </div>
  </div>


@endsection
@push('js')

@endpush
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Teacher</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form style=""method="POST"action="{{route('teacher.store')}}"enctype="multipart/form-data">
          @csrf
            <div class="form-group">
              <label for="name">Teacher Name</label>
              <input type="text" required name="name"class="form-control" id="name" >
            </div>
            <div class="form-group">
              <label for="email">Teacher Email</label>
              <input type="text" required name="email"class="form-control" id="email" >
            </div>
            <div class="form-group">
              <label for="phone">Teacher Phone</label>
              <input type="number" required name="phone"class="form-control" id="phone" >
            </div>
            <div class="form-group">
              <label for="division_id">Division Name</label>
                <select name="division_id" id="division_id"class="form-control">
                  <option value="">Select Division for the District</option>
                  @foreach ($division as $division )
                  <option value="{{$division->id}}">{{$division->name}}</option>
                    
                  @endforeach
                </select>
            </div>
            <div class="form-group">
              <label for="district_id">District Name</label>
                <select name="district_id" id="district_id"class="form-control">
                  <option value="">Select District for the Division</option>
                  @foreach ($district as $district )
                  <option value="{{$district->id}}">{{$district->name}}</option>
                    
                  @endforeach
                </select>
            </div>
            <div class="form-group">
              <label for="image">Fiture Image</label>
              <input type="file" required name="image"class="form-control" id="image" >
            </div>

            <div class="form-group">
              <label for="description">Description</label>
              <textarea name="description" id="description" class="form-control"cols="30" rows="3"></textarea>
            </div>
           
           
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
      </div>
     
    </div>
  </div>
</div>