@extends('master')

@section('content')
<div class="content-wrapper" style="min-height: 1724.5px;width:1100px;margin-left:0px">
    <div class="card">
      <div class="card-body">
       
        <h3>Edit Result</h3>
        <div class="container">
          <form style=""method="POST"action="{{route('result.update',$result->id)}}"enctype="multipart/form-data">
            @csrf
              <div class="form-group">
                <label for="student_id">Student Name</label>
                <select required name="student_id" id="student_id"class="form-control">
                  <option value="">Select the Student for the Result</option>
                  @foreach ($student as $student)
                  <option value="{{$student->id}}"{{$result->student_id == $student->id ? 'selected' :''}}>{{$student->name}}</option>
                    
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="class_id">Class Name</label>
                <select required name="class_id" id="class_id"class="form-control">
                  <option value="">Select the Class for the Result</option>
                  @foreach ($studentClass as $class)
                  <option value="{{$class->id}}" {{$result->class_id == $class->id ? 'selected' :''}}>{{$class->name}}</option>
                    
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="subject_id">Subject Name</label>
                <select required name="subject_id" id="subject_id"class="form-control">
                  <option value="">Select the Subject for the Result</option>
                  @foreach ($subject as $subject)
                  <option value="{{$subject->id}}" {{$result->subject_id == $subject->id ? 'selected' : ''}}>{{$subject->name}}</option>
                    
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="name">Gread Name</label>
                <input type="text"value="{{$result->name}}" required name="name"class="form-control" id="name" >
              </div>
              <div class="form-group">
                <label for="name">Description</label>
                <textarea required class="form-control"name="description" id="description" cols="30" rows="3">{{$result->description}}</textarea>
              </div>
           
             
             
              <button type="submit" class="btn btn-primary">Submit</button>
              <a href="{{route('result.create')}}"class="btn btn-danger">BACK</a>
            </form>
        </div>
                  
           
              
          
        </div>
      </div>
    </div>
  </div>


@endsection
@push('js')

@endpush
