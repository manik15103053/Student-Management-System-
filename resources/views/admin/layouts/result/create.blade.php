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
          <a href=""class="btn btn-info"data-bs-toggle="modal" data-bs-target="#exampleModal">Add Result</a>
        <h2 class="card-title">Result List</h2>
        
       

        <div class="row">
          <div class="col-12">
            <table class="table table-hover table-striped">
              <thead>
                <tr>
                  <th>Sl</th>
                  <th>Student Name.</th>
                  <th>Class.</th>
                  <th>Subject.</th>
                  <th>Gread.</th>
                  <th>Created At.</th>
                  <th>action</th>
                </tr>
              </thead>
              <tbody>
            @foreach ($results as $key=>$result)

            <tr>
              <td>{{$key +1}}</td>
              <td>{{$result->student->name}}</td>
              <td>{{$result->class->name}}</td>
              <td>{{$result->subject->name}}</td>
              <td>{{$result->name}}</td>
              <td>{{$result->created_at}}</td>
              <td>
                <a href="{{route('result.edit',$result->id)}}"class="btn btn-info">Edit</a>
                <a href="{{route('result.delete',$result->id)}}"class="btn btn-danger">Delete</a>
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
        <h5 class="modal-title" id="exampleModalLabel">Add Result</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form style=""method="POST"action="{{route('result.store')}}"enctype="multipart/form-data">
          @csrf
            <div class="form-group">
              <label for="student_id">Student Name</label>
              <select required name="student_id" id="student_id"class="form-control">
                <option value="">Select the Student for the Result</option>
                @foreach ($student as $student)
                <option value="{{$student->id}}">{{$student->name}}</option>
                  
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="class_id">Class Name</label>
              <select required name="class_id" id="class_id"class="form-control">
                <option value="">Select the Class for the Result</option>
                @foreach ($studentClass as $class)
                <option value="{{$class->id}}">{{$class->name}}</option>
                  
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="subject_id">Subject Name</label>
              <select required name="subject_id" id="subject_id"class="form-control">
                <option value="">Select the Subject for the Result</option>
                @foreach ($subject as $subject)
                <option value="{{$subject->id}}">{{$subject->name}}</option>
                  
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="name">Gread Name</label>
              <input type="text" required name="name"class="form-control" id="name" >
            </div>
            <div class="form-group">
              <label for="name">Description</label>
              <textarea required class="form-control"name="description" id="description" cols="30" rows="3"></textarea>
            </div>
         
           
           
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
      </div>
     
    </div>
  </div>
</div>