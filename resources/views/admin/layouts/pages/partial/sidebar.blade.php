<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="user-info">
      <div class="profile">
        <img src="https://image.pngaaa.com/970/3314970-middle.png" alt="">
      </div>
      <div class="details">
        <p class="user-name">{{Auth::user()->name}}</p>
        <p class="designation">Developer</p>
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