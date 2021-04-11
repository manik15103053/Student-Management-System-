@extends('master')


@section('content')

<div class="row">
    <div class="col-sm-6 col-md-3 grid-margin">
      <div class="card">
        <div class="card-body">
          <h2 class="card-title">All Students: {{$students->count()}}</h2>
        </div>
        <div class="dashboard-chart-card-container">
          <div id="dashboard-card-chart-1" class="card-float-chart"></div>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-md-3 grid-margin">
      <div class="card">
        <div class="card-body">
          <h2 class="card-title">All Class: {{$studentClass->count()}}</h2>
        </div>
        <div class="dashboard-chart-card-container">
          <div id="dashboard-card-chart-2" class="card-float-chart"></div>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-md-3 grid-margin">
      <div class="card">
        <div class="card-body">
          <h2 class="card-title">All Teachers : 10</h2>
        </div>
        <div class="dashboard-chart-card-container">
          <div id="dashboard-card-chart-3" class="card-float-chart"></div>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-md-3 grid-margin">
      <div class="card">
        <div class="card-body">
          <h2 class="card-title">All Sections: 12</h2>
        </div>
        <div class="dashboard-chart-card-container">
          <div id="dashboard-card-chart-4" class="card-float-chart"></div>
        </div>
      </div>
    </div>
  </div>
@endsection