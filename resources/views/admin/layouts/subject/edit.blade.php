@extends('master')

@section('content')
<div class="content-wrapper" style="min-height: 1724.5px;width:1100px;margin-left:0px">
    <div class="card">
      <div class="card-body">
       
        <h3>Edit Subject</h3>
        <div class="container">
          <form style=""method="POST"action="{{route('subject.update',$subject->id)}}"enctype="multipart/form-data">
            @csrf
              <div class="form-group">
                <label for="class_id">Class Name</label>
                <select name="class_id" id="class_id"class="form-control">
                  <option value="">Select the Class for the Subject</option>
                  @foreach ($studentClass as $class)
                  <option value="{{$class->id}}" {{$subject->class->id == $class->id ? 'selected':''}}>{{$class->name}}</option>
                    
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="name">Subject Name</label>
                <input type="text"value="{{$subject->name}}" required name="name"class="form-control" id="name" >
              </div>
              <div class="form-group">
                <label for="name">Description</label>
                <textarea required class="form-control"name="description" id="description" cols="30" rows="3">{{$subject->description}}</textarea>
              </div>
           
             
             
              <button type="submit" class="btn btn-primary">Submit</button>
              <a href="{{route('subject.create')}}"class="btn btn-danger">BACK</a>
            </form>
        </div>
                  
           
              
          
        </div>
      </div>
    </div>
  </div>


@endsection
@push('js')

@endpush
