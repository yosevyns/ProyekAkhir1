<!DOCTYPE html>
@section('title')
Masuk
@endsection
@include('auth.layouts.head')
<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Body-->
  <body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="blank-page">
    <!-- BEGIN: Content-->
    <div class="app-content content ">
      <div class="content-overlay"></div>
      <div class="header-navbar-shadow"></div>
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body"><div class="auth-wrapper auth-basic px-2">
  <div class="auth-inner my-2">
    <!-- Login basic -->
    @if(session()->has('loginError'))
      <div class="alert alert-danger" role="alert" style="height:50px; margin: 5px;" >
        {{ session('loginError') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif
    @if(session()->has('success'))
    <div class="alert alert-success" role="alert" style="height:50px; margin: 5px;">
      {{ session('success') }}
    
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="card mb-0">
      <div class="card-body">
          <h2 class="brand-text text-primary text-center">MASUK</h2>
        </a>
        <h4 class="card-title text-center">Selamat Datang di Ulos Toba! 👋</h4>
        <p class="card-text mb-2 text-center">Silakan masuk ke akun Anda dan mulai petualangan</p>

        <form  action="{{route('authenticate.login')}}" method="post">
          @csrf
          <div class="mb-1">
            <label for="email" class="form-label">Email</label>
            <input
              type="email"
              class="form-control @error('email')is-invalid @enderror"
              id="email"
              name="email"
              placeholder="email@mail.com"
              autofocus 
            />
            @error('email')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>

          <div class="mb-1">
            <div class="d-flex justify-content-between">
              <label class="form-label" for="password">Kata Sandi</label>
            </div>
              <input
                type="password"
                class="form-control form-control-merge @error('password')is-invalid @enderror"
                id="password"
                name="password"
                placeholder="*******"
                
              />
              @error('password')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
          </div>
          <div class="mb-1">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="remember-me" tabindex="3" />
              <label class="form-check-label" for="remember-me"> Ingat Saya </label>
            </div>
          </div>
            <button type="submit" class="btn btn-primary w-100" >Masuk</button>
        </form>

        <p class="text-center mt-2">
          <span>Belum memiliki akun?</span>
          <a href="{{url('/register')}}">
            <span>Buat akun baru</span>
          </a>
        </p>
        <p class="text-center mt-2"><span>Kembali Ke Halaman </span><a href="{{url('dashboard')}}">Utama</a>?</p>
      </div>
    </div>
    <!-- /Login basic -->
  </div>
</div>

        </div>
      </div>
    </div>
    <!-- END: Content-->
    @include('sweetalert::alert')

    @include('auth.layouts.script')

  </body>
  <!-- END: Body-->
</html>

    