@extends('master')

@section('content')
<div class="content-wrapper" style="min-height: 1724.5px;width:1100px;margin-left:0px">
    <div class="card">
      <div class="card-body">
       
        <h3>Edit Division</h3>
        <div class="container">
          <form style=""method="POST"action="{{route('district.update',$district->id)}}"enctype="multipart/form-data">
            @csrf
              <div class="form-group">
                <label for="name">District Name</label>
                <input type="text" value="{{$district->name}}"required name="name"class="form-control" id="name" >
              </div>
              <div class="form-group">
                <label for="division_id">Division Name</label>
                  <select name="division_id" id="division_id"class="form-control">
                    <option value="">Select Division for the District</option>
                    @foreach ($division as $division )
                    <option value="{{$division->id}}"{{$district->division->id == $division->id ? 'selected':''}}>{{$division->name}}</option>
                      
                    @endforeach
                  </select>
              </div>
  
              <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control"cols="30" rows="3">{{$district->description}}</textarea>
              </div>
             
             
              <button type="submit" class="btn btn-primary">Submit</button>
              <a href="{{route('district.create')}}"class="btn btn-danger">BACK</a>
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
