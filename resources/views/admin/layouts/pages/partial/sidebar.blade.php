<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="user-info">
      <div class="profile">
        <img src="{{asset('images/user/'.$user->image)}}" alt="">
      </div>
      <div class="details">
        <p class="user-name">{{Auth::user()->name}}</p>
        <p class="designation">{{Auth::user()->username}}</p>
      </div>
    </div>
    <ul class="nav">
      <!--main pages start-->
      <li class="nav-item nav-category">
        <span class="nav-link">Main</span>
      </li>
      <li class="">
        <a class="nav-link" href="{{route('home')}}">
          <i class="mdi mdi-gauge menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      <li class="">
        <a class="nav-link" href="{{route('index')}}">
          <i class="mdi mdi-gauge menu-icon"></i>
          <span class="menu-title">Manage Student</span>
        </a>
      </li>
      <li class="">
        <a class="nav-link" href="{{route('class.create')}}">
          <i class="mdi mdi-gauge menu-icon"></i>
          <span class="menu-title">Manage Class</span>
        </a>
      </li>
      <li class="">
        <a class="nav-link" href="{{route('teacher.create')}}">
          <i class="mdi mdi-gauge menu-icon"></i>
          <span class="menu-title">Manage Teacher</span>
        </a>
      </li>
      <li class="">
        <a class="nav-link" href="{{route('section.create')}}">
          <i class="mdi mdi-gauge menu-icon"></i>
          <span class="menu-title">Manage Section</span>
        </a>
      </li>
      <li class="">
        <a class="nav-link" href="{{route('subject.create')}}">
          <i class="mdi mdi-gauge menu-icon"></i>
          <span class="menu-title">Manage Subject</span>
        </a>
      </li>
      <li class="">
        <a class="nav-link" href="{{route('result.create')}}">
          <i class="mdi mdi-gauge menu-icon"></i>
          <span class="menu-title">Manage Gread</span>
        </a>
      </li>

      <li class="">
        <a class="nav-link" href="{{route('division.create')}}">
          <i class="mdi mdi-gauge menu-icon"></i>
          <span class="menu-title">Manage Division</span>
        </a>
      </li>
      <li class="">
        <a class="nav-link" href="{{route('district.create')}}">
          <i class="mdi mdi-gauge menu-icon"></i>
          <span class="menu-title">Manage District</span>
        </a>
      </li>
     
      <li class="">
        <a class="nav-link" href="{{route('settings')}}">
          <i class="mdi mdi-gauge menu-icon"></i>
          <span class="menu-title">Settings</span>
        </a>
      </li>
      <li class="">
        <a class="nav-link" href="{{route('logout')}}">
          <i class="mdi mdi-gauge menu-icon"></i>
          <span class="menu-title">Logout</span>
        </a>
      </li>

    
     
    </ul>
  </nav>