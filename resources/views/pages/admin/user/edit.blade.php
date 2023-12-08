@extends('theme.admin.main')
<link rel="stylesheet" type="text/css" href="/assets/css/style.css">
@section('content')
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
      <div class="content-header row">
      </div>
        <div class="content-body">
            <!-- list and filter start -->
            @if(session()->has('status'))
                <div class="alert alert-success text-center" role="alert" style="height:50px; margin: 5px;">
                    {{ session('status') }}
                    
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="card">
                <div class="card-header border-bottom">
                    <h4 class="card-title" style="text-transform: capitalize; color:blue">Profile {{Auth::user()->name}}</h4>
                </div>
                <div class="card-body py-2 my-25">
            
                    <!-- form -->
                        <form action="{{route('user.update', Auth::user()->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-1">
                              <label for="username" class="form-label">Nama Pengguna</label>
                              <input
                                type="text"
                                class="form-control  @error('username')is-invalid @enderror"
                                id="username"
                                name="username"
                                placeholder="exampleUserName"
                                value="{{Auth::user()->username}}"
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
                                placeholder="example@example.com"
                                value="{{Auth::user()->email}}"
                                required
                              />
                              @error('email')
                              <div class="invalid-feedback">
                                {{ $message }}
                              </div>
                            @enderror
                            </div>
                          <div class="mb-1">
                              <label for="name" class="form-label">Name</label>
                              <input
                                type="text"
                                class="form-control  @error('name')is-invalid @enderror"
                                id="name"
                                name="name"
                                placeholder="ExampleName"
                                value="{{Auth::user()->name}}"
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
                                value="{{Auth::user()->date_of_birth}}"
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
                                  placeholder="*******"
                                  required
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
                            <button class="btn btn-primary w-100" tabindex="5" type="submit">Submit</button>
                          </form>
                    <!--/ form -->
                </div>
                </div>
            <!-- list and filter end -->
        </div>
    </div>
</div>
<script src="../../../app-assets/js/scripts/pages/app-user-list.min.js"></script>
@endsection