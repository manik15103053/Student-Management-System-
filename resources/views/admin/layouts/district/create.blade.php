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
        <a href=""class="btn btn-info"data-bs-toggle="modal" data-bs-target="#exampleModal">Add New District</a>
       
        <h3>District List</h3>
        <div class="container">
          <table class="table table-hover table-striped">
            <thead>
              <tr>
                <th>Sl</th>
                <th>District Name.</th>
                <th>Division Name.</th>
                <th>Created At.</th>
                <th>Updated At.</th>
                <th>action</th>
              </tr>
            </thead>
            <tbody>
        
             @foreach ($district as $key=>$district)
             <tr>
               <td>{{$key + 1}}</td>
               <td>{{$district->name}}</td>
               <td>{{$district->division->name}}</td>
               <td>{{$district->created_at}}</td>
               <td>{{$district->updated_at}}</td>
               <td>
                 <a href="{{route('district.edit',$district->id)}}"class="btn btn-primary">Edit</a>
                 <a href="{{route('district.delete',$district->id)}}"class="btn btn-danger">Delete</a>
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
        <h5 class="modal-title" id="exampleModalLabel">Add New District</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form style=""method="POST"action="{{route('district.store')}}"enctype="multipart/form-data">
          @csrf
            <div class="form-group">
              <label for="name">District Name</label>
              <input type="text" required name="name"class="form-control" id="name" >
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
              <label for="description">Description</label>
              <textarea name="description" id="description" class="form-control"cols="30" rows="3"></textarea>
            </div>
           
           
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
      </div>
     
    </div>
  </div>
</div>