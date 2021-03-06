@extends('master')

@section('content')

<div class="content-wrapper" style="min-height: 1724.5px;width:1100px;margin-left:0px">
    <div class="card">
      <div class="card-body">
        @if(Session::has('msg'))
        <div class="alert alert-primary">
            {{ Session::get('msg') }}
        </div>
        @endif
          <a href=""class="btn btn-info"data-bs-toggle="modal" data-bs-target="#exampleModal">Add New Class</a>
        <h2 class="card-title">Class List</h2>
        
       

        <div class="row">
          <div class="col-12">
            <table class="table table-hover table-striped">
              <thead>
                <tr>
                  <th>Sl</th>
                  <th>Class Name.</th>
                  <th>Created At.</th>
                  <th>Updated At.</th>
                  <th>action</th>
                </tr>
              </thead>
              <tbody>
            @foreach ($studentClass as $key=>$class)

            <tr>
              <td>{{$key + 1}}</td>
              <td>{{$class->name}}</td>
              <td>{{$class->created_at}}</td>
              <td>{{$class->updated_at}}</td>
              <td>
                <a href="{{route('class.edit',$class->id)}}"class="btn btn-info">Edit</a>
                <a href="{{route('class.delete',$class->id)}}"class="btn btn-danger">Delete</a>
              </td>
            </tr>
              
            @endforeach
               
                  
           
              
              
              </tbody>
            </table>
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
        <h5 class="modal-title" id="exampleModalLabel">Add New Class</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form style=""method="POST"action="{{route('class.store')}}"enctype="multipart/form-data">
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