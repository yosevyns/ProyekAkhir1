<div class="main-menu menu-fixed menu-accordion menu-shadow menu-light expanded" data-scroll-to-active="true" style="touch-action: none; user-select: none; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); ">
    <div class="navbar-header">
      <ul class="nav navbar-nav flex-row">
        <li class="nav-item me-auto"><a class="navbar-brand" href="#"><span class="brand-logo"><img src="/img/logo2.png" alt=""></span>
            <h3 class="brand-text text-warning">Pesona Ulos</h3></a>
          </li>
        <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse"><i class="d-block d-xl-none text-warning toggle-icon font-medium-4" data-feather="x"></i><i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-warning" data-feather="disc" data-ticon="disc"></i></a></li>
      </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
      <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
        <li class=" nav-item {{ Request::is('dashboard')?'sidebar-group-active':'' }}"><a class="d-flex align-items-center" href="{{url('/dashboard')}}"><i  data-feather="home"></i><span class="menu-title text-truncate" data-i18n="Dashboards">Beranda</span></a>
        </li>
        <li class=" nav-item has-sub {{ Request::is('dashboard/kategori')?'sidebar-group-active':'' }} {{ Request::is('dashboard/ulos')?'sidebar-group-active':''}}"><a class="d-flex align-items-center" href="" ><i data-feather='box'></i><span class="menu-title text-truncate" >Ulos</span></a>
          <ul class="menu-content">
            <li class=" nav-item  {{ Request::is('dashboard/ulos')?'sidebar-group-active':''}}">
              <a class="d-flex align-items-center" href="{{url('dashboard/ulos')}}">
                <i data-feather='circle'></i>
                <span class="menu-title text-truncate" >Nama-Nama Ulos</span>
              </a>
            </li>
            <li class=" nav-item  {{ Request::is('dashboard/kategori')?'sidebar-group-active':'' }}">
              <a class="d-flex align-items-center" href="{{url('dashboard/kategori')}}">
                <i data-feather='circle'></i>
                <span class="menu-title text-truncate" >Kategori Ulos</span>
              </a>
            </li>
          </ul>
        </li>
        <li class=" nav-item {{ Request::is('dashboard/galeri')?'sidebar-group-active':'' }}">
            <a class="d-flex align-items-center" href="{{url('dashboard/galeri')}}">
              <i data-feather='image' ></i><span class="menu-title text-truncate" >Foto Ulos</span>
            </a>
        </li>
        <li class=" nav-item {{ Request::is('sejarah')?'sidebar-group-active':'' }}">
          <a class="d-flex align-items-center" href="{{url('sejarah')}}">
            <i data-feather='archive'></i>
            <span class="menu-title text-truncate" >Sejarah Ulos</span>
          </a>
        </li>
        
        <li class=" nav-item {{ Request::is('comment')?'sidebar-group-active':'' }}">
          <a class="d-flex align-items-center" href="{{ url('comment') }}">
            <i data-feather='message-square' ></i>
            <span class="menu-title text-truncate" >Komentar</span>
          </a>
        </li>

        
        @auth
        <li class=" nav-item has-sub {{ Request::is('ulos')||Request::is('kategori')||Request::is('haskategori')||Request::is('galeri')?'sidebar-group-active':''}}"><a class="d-flex align-items-center" href="" ><i data-feather='grid'></i>Data</span></a>
          <ul class="menu-content">
           @if(Auth::user()->role=="admin")
           <li class=" nav-item  {{ Request::is('ulos')?'sidebar-group-active':'' }}">
            <a class="d-flex align-items-center" href="{{url('ulos')}}">
              <i data-feather='circle'></i>
              <span class="menu-title text-truncate" >Data Nama Ulos</span>
            </a>
          </li>
          <li class="nav-item  {{ Request::is('kategori')?'sidebar-group-active':'' }}">
            <a class="d-flex align-items-center" href="{{url('kategori')}}">
              <i data-feather='circle'></i>
              <span class="menu-title text-truncate" >Data Kategori Ulos</span>
            </a>
          </li>
          {{-- <li class="nav-item  {{ Request::is('haskategori')?'sidebar-group-active':'' }}">
            <a class="d-flex align-items-center" href="{{url('haskategori')}}">
              <i data-feather='circle'></i>
              <span class="menu-title text-truncate" >Data Ulos Dengan Kategori</span>
            </a>
          </li> --}}
           @endif
            <li class="{{ Request::is('galeri')?'sidebar-group-active':'' }} nav-item">
              <a class="d-flex align-items-center" href="{{url('galeri')}}">
                <i data-feather='circle'></i>
                <span class="menu-title text-truncate" >Data Foto Ulos</span>
              </a>
            </li>

          </ul>
        </li>
        @if(Auth::user()->role=="admin")
        <li class=" nav-item  {{ Request::is('user')?'sidebar-group-active':'' }}">
          <a class="d-flex align-items-center" href="{{ url('user') }}">
            <i data-feather='users'></i>
            <span class="menu-title text-truncate" >User</span>
          </a>
        </li>
        @endif
        @endauth
      </ul>
    </div>
  </div>