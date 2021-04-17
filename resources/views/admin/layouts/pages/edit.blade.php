@extends('master')

@section('content')
<div class="content-wrapper" style="min-height: 1724.5px;width:1000px;margin-left:0px">
    <div class="card">
      <div class="card-body">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if(Session::has('msg'))
        <div class="alert alert-info">
            {{ Session::get('msg') }}
        </div>
    @endif
        <h2 class="card-title">Edit Student</h2>
        <form style="width:60%;"method="POST"action="{{route('update.student',$students->id)}}"enctype="multipart/form-data">
          @csrf
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text"value="{{$students->name}}" required name="name"class="form-control" id="name"  placeholder="Enter Your Name">
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email"value="{{$students->email}}" required class="form-control" name="email"id="email" placeholder="Enter Email">
            </div>
            <div class="form-group">
              <label for="phone">Phone No</label>
              <input type="number"value="{{$students->phone}}" required class="form-control" name="phone"id="phone" placeholder="Enter Your Phone">
            </div>
            <div class="form-group">
              <label for="class_id">Class Name</label>
              <select name="class_id" id="class_id"class="form-control">
                <option value="">Select The Student Class</option>
                @foreach ($studentClass as $class)
                <option value="{{$class->id}}"{{$students->class->id == $class->id ? 'selected':''}}>{{$class->name}}</option>
                  
                @endforeach

              </select>
            </div>
            <div class="form-group">
              <label for="section_id">Section Name</label>
              <select name="section_id" id="section_id"class="form-control">
                <option value="">Select The Section For The Student</option>
                @foreach ($section as $section)
                <option value="{{$section->id}}" {{$students->section->id == $section->id ? 'selected':''}}>{{$section->name}}</option>
                  
                @endforeach

              </select>
            </div>
            <div class="form-group">
              <label for="teacher_id">Teacher Name</label>
              <select name="teacher_id" id="teacher_id"class="form-control">
                <option value="">Select The Teacher For the Student</option>
                @foreach ($teacher as $teacher)
                <option value="{{$teacher->id}}" {{$students->teacher->id == $teacher->id ? 'selected':''}}>{{$teacher->name}}</option>
                  
                @endforeach

              </select>
            </div>
            <div class="form-group">
              <label for="division_id">Division Name</label>
              <select name="division_id" id="division_id"class="form-control">
                <option value="">Select The Division For the Student</option>
                @foreach ($division as $division)
                <option value="{{$division->id}}" {{$students->division->id == $division->id ? 'selected':''}}>{{$division->name}}</option>
                  
                @endforeach

              </select>
            </div>
            <div class="form-group">
              <label for="district_id">District Name</label>
              <select name="district_id" id="district_id"class="form-control">
                <option value="">Select The District For the Student</option>
                @foreach ($district as $district)
                <option value="{{$district->id}}" {{$students->district->id == $district->id ? 'selected':''}}>{{$district->name}}</option>
                  
                @endforeach

              </select>
            </div>
         
            <div class="form-group">
              <label for="date">Date</label>
              <input type="date"value="{{$students->date}}" required class="form-control" name="date"id="date" placeholder="Enter Division">
            </div>
            <div class="form-group">
              <label for="student_image">Image</label>
              <input type="file" class="form-control" name="student_image"id="student_image" >
            </div>
            <div class="form-group">
              <label for="description">Description</label>
              <textarea name="description" class="form-control"id="description" cols="30" rows="3">{{$students->description}}</textarea>
            </div>
           
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{route('index')}}"class="btn btn-danger">BACK</a>
          </form>
       
      </div>
    </div>
  </div>
@endsection
