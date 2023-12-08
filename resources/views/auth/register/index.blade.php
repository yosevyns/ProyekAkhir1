  @include('auth.layouts.head')
 
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
  @section('title')
  Registrasi
  @endsection

    <body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="blank-page">
      <!-- BEGIN: Content-->
      @include('sweetalert::alert')
      <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
          <div class="content-header row">
          </div>
          <div class="content-body"><div class="auth-wrapper auth-basic px-2">
    <div class="auth-inner my-2">
      <!-- Register basic -->
      <div class="card mb-0">
        <div class="card-body">
            <h2 class="brand-text text-primary text-center">Registrasi</h2>
          </a>
  
          <h4 class="card-title mb-1 text-center">Petualangan dimulai di sini 🚀</h4>
        <form class="auth-register-form mt-2" action="{{route('register')}}" method="post">
            @csrf
            <div class="mb-1">
              <label for="username" class="form-label">Nama Pengguna</label>
              <input
                type="text"
                class="form-control  @error('username')is-invalid @enderror"
                id="username"
                name="username"
                placeholder="Nama Pengguna"
                autofocus required
              />
              @error('username')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="mb-1">
              <label for="email" class="form-label">Email</label>
              <input
                type="email"
                class="form-control  @error('email')is-invalid @enderror"
                id="email"
                name="email"
                placeholder="email@mail.com"
                required
              />
              @error('email')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
            </div>
          <div class="mb-1">
              <label for="name" class="form-label">Nama</label>
              <input
                type="text"
                class="form-control  @error('name')is-invalid @enderror"
                id="name"
                name="name"
                placeholder="Nama Anda"
                required
              />
              @error('name')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
            </div>

            <div class="mb-1" id="pick-a-time">
              <label for="date_of_birth" class="form-label">Tanggal Lahir</label>
              <input
                type="date"
                class="form-control  @error('date_of_birth')is-invalid @enderror"
                id="date_of_birth"
                name="date_of_birth"
                required
              />
              @error('date_of_birth')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
            </div>
  
            <div class="mb-1">
              <label for="password" class="form-label">Kata Sandi</label>
  
              <div class="input-group input-group-merge form-password-toggle">
                <input
                  type="password"
                  class="form-control form-control-merge  @error('password')is-invalid @enderror"
                  id="password"
                  name="password"
                  required
                  placeholder="*******"
                />
                @error('password')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
                <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
              </div>
            </div>
            <div class="mb-1">
              
            </div>
            <button class="btn btn-primary w-100" tabindex="5">Daftar</button>
          </form>
  
          <p class="text-center mt-2">
            <span>Sudah memiliki akun?</span>
            <a href="/">
              <span>Masuk</span>
            </a>
          </p>
  
         
        </div>
      </div>
      <!-- /Register basic -->
    </div>
  </div>
  
          </div>
        </div>
      </div>
      <!-- END: Content-->
    

      @include('auth.layouts.script')
    </body>