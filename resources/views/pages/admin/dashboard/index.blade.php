@extends('theme.admin.main')

@section('title')
Beranda
@endsection

@section('content')
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
      <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
          <div class="row breadcrumbs-top">
            <div class="col-12">
              <h2 class="content-header-title float-start mb-0">Beranda</h2>
            </div>
          </div>
        </div>
      </div>
        {{-- <div class="content-body">
            <section id="modal-examples">
                <div class="row justify-content-center">
                    <div class="col-md-4">
                        <div class="card">
                            <a class="btn-outline-primary" href="{{url('sejarah')}}">
                                <div class="card-body text-center">
                                    <i data-feather='book' class="font-large-2 mb-1"></i>
                                    <h5 class="card-title">Sejarah Ulos</h5>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card">
                            <a class="btn-outline-primary" href="{{url('dashboard/galeri')}}">
                                <div class="card-body text-center">
                                    <i data-feather='image' class="font-large-2 mb-1"></i>
                                    <h5 class="card-title">Galeri Ulos</h5>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card">
                            <a class="btn-outline-primary" href="{{url('dashboard/ulos')}}">
                                <div class="card-body text-center">
                                    <i data-feather='folder' class="font-large-2 mb-1"></i>
                                    <h5 class="card-title">Nama Nama Ulos</h5>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card">
                            <a class="btn-outline-primary" href="{{url('dashboard/kategori')}}">
                                <div class="card-body text-center">
                                    <i data-feather='folder' class="font-large-2 mb-1"></i>
                                    <h5 class="card-title">Kategori Ulos</h5>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card">
                            <a class="btn-outline-primary" href="{{url('comment')}}">
                                <div class="card-body text-center">
                                    <i data-feather='message-square' class="font-large-2 mb-1"></i>
                                    <h5 class="card-title">Komentar</h5>
                                </div>
                            </a>
                        </div>
                    </div>
                    @auth
                        @if(Auth::user()->role=='admin')
                            <div class="col-md-4">
                                <div class="card">
                                    <a class="btn-outline-primary" href="{{url('user')}}">
                                        <div class="card-body text-center">
                                            <i data-feather='users' class="font-large-2 mb-1"></i>
                                            <h5 class="card-title">User</h5>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endif
                    @endauth    
                </div>
            </section>
        </div> --}}
        <div class="content-body">
        @foreach ($info as $item)
        <div class="content-detached">
            <div class="content-body">
                <!-- Blog Detail -->
                <div class="blog-detail-wrapper">
                    <div class="row">
                    <!-- Blog -->

                        <div class="col-md-12">
                            <div class="card">
                                <div class="col-md-12">
                                    <img
                                    src="{{asset('images/'.$item->gambar_ulos)}}"
                                    class="img-fluid card-img-top"
                                />
                                </div>
                                <div class="card-body">
                                    <h1>{{$item->nama_ulos}}</h1>
                                    <p class="card-text mb-2">
                                        {{-- {!! $item->deskripsi_ulos !!} --}}
                                        {!! Str::limit($item->deskripsi_ulos, 800) !!}
                                        <a href="{{url('sejarah')}}">Baca Selengkapnya</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ Blog -->
            </div>
        </div>
        @endforeach
        <div class="col-12">
            <h2 class="">Nama-Nama Ulos</h2>
          </div>
        </div>
        <div class="col-12">
            <section id="card-demo-example">
                <div class="row match-height">
                    @foreach($ulo as $item)
                  <div class="col-md-6 col-lg-4">
                    <div class="card">
                        <img class="img-fluid" src="{{asset('images/'.$item ->gambar_ulos)}}" alt="" style="width:400px; height:300px;">
                      <div class="card-body">
                      <h4 class="text-center">{{$item->nama_ulos}}</h4>
                      </div>
                        <style>
                            .text12 {
                            overflow: hidden;
                            text-overflow: ellipsis;
                            display: -webkit-box;
                            -webkit-line-clamp: 4; /* number of lines to show */
                                    line-clamp: 2; 
                            -webkit-box-orient: vertical;
                            }
                        </style>
                      <div class="card-body">
                        <div class="text12">{!! $item->deskripsi_ulos!!}</div>
                        <a href="{{ route('ulos.show',$item->id) }}" class="card-link">Lihat Detail</a>
                      </div>
                    </div>
                  </div>
                  @endforeach
                  <h5 class="text-center my-1"><a href="{{url('dashboard/ulos')}}" class="btn btn-info">Liat Lebih Banyak Mengenai Nama-Nama Ulos</a></h5>

                </div>
            </section>

            <section id="card-demo-example">
            <h2 class="">Kategori Ulos</h2>
                <div class="row match-height">
                    @foreach($kategori as $item)
                  <div class="col-md-6 col-lg-4">
                    <div class="card">
                        <img class="img-fluid" src="{{asset('images/'.$item ->cover_kategori)}}" alt="" style="width:400px; height:300px;">
                      <div class="card-body">
                        <h4 class="card-title text-center">{{$item->nama_kategori}}</h4>
                        
                      </div>
                      
                        <style>
                            .text12 {
                            overflow: hidden;
                            text-overflow: ellipsis;
                            display: -webkit-box;
                            -webkit-line-clamp: 4; /* number of lines to show */
                                    line-clamp: 2; 
                            -webkit-box-orient: vertical;
                            }
                        </style>
                      <div class="card-body">
                        <div class="card-text text12">{!! $item->deskripsi_kategori!!}</div>
                        <a href="{{ route('kategori.show',$item->id) }}" class="card-link">Lihat Detail</a>
                      </div>
                    </div>
                  </div>
                  @endforeach
                </div>
                <h5 class="text-center my-1"><a href="{{url('dashboard/kategori')}}" class="btn btn-info">Liat Lebih Banyak Mengenai Kategori Ulos</a></h5>
            </section>

            <div class="row justify-content-center m-2">
                <div class="col-md-12">
                    <div class="">
                        <div class="d-flex flex-wrap justify-content-center">
                            @foreach($galeri as $post)
                                @if($post->status==true)
                                <div class="card col-md-3">
                                
                                    <style>
                                        .thumbnail:hover {
                                            background-color: red;
                                            opacity: 0.5;
                                        }
                                    </style>
                                    <div class="border-body bg-image hover-overlay ripple shadow-1-strong rounded">
                                        <a href="#" class="thumbnail" data-bs-toggle="modal" data-bs-target="#exampleModal-{{$loop->iteration}}"><img class="img-fluid" src="{{asset('images/'.$post->gambar)}}" alt="Card image cap" style="width:300px; height:300px;"/></a>
                                    </div>
                                    <p class="text-center">{{$post->nama_ulos}}</p>
                                    
                                </div>
                                @endif
                            @endforeach

                            @foreach($galeri as $item)
                                @if($item->status==true)
                                <div class="modal fade" id="exampleModal-{{$loop->iteration}}">
                                    <div class="modal-dialog modal-lg">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel-{{$loop->iteration}}">{{$item->nama_ulos}}</h5>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="row justify-content-center">
                                            <div class="modal-body row justify-content-center" >
                                                <img class="img-fluid" src="{{asset('images/'.$item->gambar)}}" alt="Card image cap" style="width:500px; height:500px;"/>
                                             </div>
                                             {{-- <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                                 {!!$item->deskripsi_ulos!!}
                                             </div> --}}
                                        </div>
                                        
                                      </div>
                                    </div>
                                </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <h5 class="text-center my-1"><a href="{{url('dashboard/galeri')}}" class="btn btn-info">Liat Lebih Banyak Mengenai Foto Ulos</a></h5>
    </div>
    </div>
</div>
@include('sweetalert::alert')
@endsection