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
          <a href=""class="btn btn-info"data-bs-toggle="modal" data-bs-target="#exampleModal">Add New Division</a>
        <h2 class="card-title">Division List</h2>
        
       

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
            @foreach ($divisions as $key=>$div)

            <tr>
              <td>{{$key + 1}}</td>
              <td>{{$div->name}}</td>
              <td>{{$div->created_at}}</td>
              <td>{{$div->updated_at}}</td>
              <td>
                <a href="{{route('division.edit',$div->id)}}"class="btn btn-info">Edit</a>
                <a href="{{route('division.delete',$div->id)}}"class="btn btn-danger">Delete</a>
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
        <h5 class="modal-title" id="exampleModalLabel">Add New Division</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form style=""method="POST"action="{{route('division.store')}}"enctype="multipart/form-data">
          @csrf
            <div class="form-group">
              <label for="name">Division Name</label>
              <input type="text" required name="name"class="form-control" id="name" >
            </div>
            <div class="form-group">
              <label for="priority">Priority</label>
              <input type="text" required name="priority"class="form-control" id="priority" >

            </div>
         
           
           
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
      </div>
     
    </div>
  </div>
</div>