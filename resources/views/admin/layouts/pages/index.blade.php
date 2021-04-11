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
          <a href="{{route('student.create')}}"class="btn btn-info">Add New Student</a>
          <form action="{{route('index')}}"method="GET">
            @csrf
          <div class="form-group">
            <label for="class_id">Student Class</label>
            <select name="class_id" id="class_id"class="form-control">
              <option value="">select Student Class</option>
              @foreach ($studentClass as $class)
                <option value="{{$class->id}}">{{$class->name}}</option>                
              @endforeach
            </select>
          </div>
          <button type="submit" class="btn btn-primary">Search Class</button>
          </form>
          <h2 class="card-title">Student List</h2>
        
       

        <div class="row">
          <div class="col-12">
            <table class="table table-hover table-striped">
              <thead>
                <tr>
                  <th>Sl</th>
                  <th>Student Name.</th>
                  <th>Student Email.</th>
                  <th>Student Class.</th>
                  <th>Student Phone.</th>
                  <th>Student Division.</th>
                  <th>Student Country.</th>
                  <th>Action. </th>
                </tr>
              </thead>
              <tbody>
          
               @foreach ($students as $key=>$student)
               <tr>
                 <td>{{$key +1}}</td>
                 <td>{{$student->name}}</td>
                 <td>{{$student->email}}</td>
                 <td>{{$student->class->name}}</td>
                 <td>{{$student->phone}}</td>
                 <td>{{$student->district}}</td>
                 <td>{{$student->country}}</td>
                 <td>
                      <a href="{{route('student.edit',$student->id)}}"class="">
                        <i class="material-icons">edit</i>
                    </a>
                    <a href="{{route('student.delete',$student->id)}}"class="">
                      <i class="material-icons">delete</i>
                  </a>
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