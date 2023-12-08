  
  <nav class="header-navbar navbar navbar-expand-lg align-items-center navbar-light navbar-shadow fixed-top bg-info">
    <div class="navbar-container d-flex content">
      <div class="bookmark-wrapper d-flex align-items-center">
        <ul class="nav navbar-nav d-xl-none">
          <li class="nav-item"><a class="nav-link menu-toggle" href="#"><i class="ficon" data-feather="menu"></i></a></li>
        </ul>
      </div>
      <ul class="nav navbar-nav align-items-center ms-auto">
        <li class="nav-item dropdown dropdown-user">
          <a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="user-nav d-sm-flex">
              @auth
              <span class="user-name fw-bolder">{{ auth()->user()->name }}</span>
              <span class="user-status">{{ Auth::user()->role}}</span>
              @endauth
              @guest
              <span class="user-name fw-bolder text-white mx-1">Selamat Datang Teman!</span>
              <span class="user-name fw-bolder text-white">||</span>
              <a href="{{url('/')}}" class="nav-link text-white">Masuk</a>
              @endguest
            </div>
            {{-- <span class="avatar"><img class="round" src="../../../app-assets/images/portrait/small/avatar-s-11.jpg" alt="avatar" height="40" width="40">
            <span class="avatar-status-online"></span>
            </span> --}}
          </a>
          @auth
          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-user">
            <a class="dropdown-item" href="{{route('user.edit', Auth::user()->id)}}">
              <i class="me-50" data-feather="user"></i> Profile
            </a>
            <div class="dropdown-divider"></div>
            <form action="/logout" method="post">
              @csrf
              <button type="submit" class="dropdown-item"><i class="me-50" data-feather="power"></i> Logout</button>
            </form>
          </div>
          @endauth
        </li>
      </ul> 
    </div>
  </nav>