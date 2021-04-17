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
        <h2 class="card-title">Student all Information</h2>
        
       

        <div class="row">
          <div class="col-12">
            <p>
                <h3 >Student Name:  {{$student->name}}</h3>
            </p>
            <p>
                <h3 >Student Email:  {{$student->email}}</h3>
            </p>
            <p>
                <h3 >Student Phone:  {{$student->phone}}</h3>
            </p>
            <p>
                <h3 >Student Class:  {{$student->class->name}}</h3>
            </p>
            <p>
                <h3 >Student Section:  {{$student->section->name}}</h3>
            </p>
            <p>
                <h3 >Student Teacher:  {{$student->teacher->name}}</h3>
            </p>
            <p>
                <h3 >Student Division:  {{$student->division->name}}</h3>
            </p>
            <p>
                <h3 >Student District:  {{$student->district->name}}</h3>
            </p>
            <p>
                <h3 >Student Image:  
                    <img src="{{asset('/images/student'.$student->image)}}" width="50"alt="">
                </h3>
            </p>
            <p>
                <h3 >Student Description:  {{$student->description}}</h3>
            </p>
            <a href="{{route('home')}}"class="btn btn-danger">BACK</a>
        </div>
      </div>
    </div>
  </div>
@endsection
@push('js')

@endpush
