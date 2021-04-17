@extends('master')


@section('content')

<div class="row">
    <div class="col-sm-6 col-md-3 grid-margin">
      <div class="card">
        <div class="card-body">
          <h2 class="card-title">Total Students: {{$students->count()}}</h2>
        </div>
        <div class="dashboard-chart-card-container">
          <div id="dashboard-card-chart-1" class="card-float-chart"></div>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-md-3 grid-margin">
      <div class="card">
        <div class="card-body">
          <h2 class="card-title">Total Class: {{$studentClass->count()}}</h2>
        </div>
        <div class="dashboard-chart-card-container">
          <div id="dashboard-card-chart-2" class="card-float-chart"></div>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-md-3 grid-margin">
      <div class="card">
        <div class="card-body">
          <h2 class="card-title">Total Teachers : {{$teacher->count()}}</h2>
        </div>
        <div class="dashboard-chart-card-container">
          <div id="dashboard-card-chart-3" class="card-float-chart"></div>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-md-3 grid-margin">
      <div class="card">
        <div class="card-body">
          <h2 class="card-title">Total Sections: {{$section->count()}}</h2>
        </div>
        <div class="dashboard-chart-card-container">
          <div id="dashboard-card-chart-4" class="card-float-chart"></div>
        </div>
      </div>
    </div>
  </div>
  <div class="content-wrapper" style="min-height: 1724.5px;width:1100px;margin-left:0px">
    <div class="card">
      <div class="card-body">
        @if(Session::has('msg'))
        <div class="alert alert-primary">
            {{ Session::get('msg') }}
        </div>
        @endif

        <h2 class="card-title">Search Result Sheet
          <form method="GET"action="">
            @csrf
          
          <div class="col-auto"style="width:200px;float:right;">
            <input type="text" id="search" name="search"class="form-control"placeholder="Search Result">
        
          </div>
          <div class="col-auto"style="width:15px;margin-left: 71%;margin-bottom: 1%;">
            <button style="margin-top: 5%;" type="submit" class="btn btn-primary">search</button>
        
          </div>
        
        </form>
        </h2>
    
        
       

        <div class="row">
          <div class="col-12">
         
            <table class="table table-hover table-striped">
              <thead>
                <tr>
                  <th>Sl</th>
                  <th>Student Name.</th>
                  <th>Eamil.</th>
                  <th>Phone</th>
                  <th>Class.</th>
                  <th>Subject.</th>
                  <th>Gread.</th>
                  <th>Image.</th>
                  <th>Action. </th>
                </tr>
              </thead>
              <tbody>
          
               @foreach ($result as $key=>$result)
               <tr>
                 <td>{{$key +1}}</td>
                 <td>{{$result->student->name}}</td>
                 <td>{{$result->student->email}}</td>
                 <td>{{$result->student->phone}}</td>
                 <td>{{$result->class->name}}</td>
                 <td>{{$result->subject->name}}</td>
                 <td>{{$result->name}}</td>
                 <td>
                   <img src="{{asset('/images/student'.$result->student->image)}}" width="40"alt="">
                 </td>
                 
              

              
                 <td>
                   <a href=""class="btn btn-info">view</a>
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