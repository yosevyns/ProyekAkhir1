@extends('theme.admin.main')

@section('title')
{{ $ulo->nama_kategori }}
@endsection

@section('content')
<div class="app-content content ">
    <div class="content-wrapper container-xxl p-0">
        <div class="content-overlay"></div>
        <div class="content-wrapper container row">
                <div class="col-12">
                    <h2 class="content-header">{{ $ulo->nama_kategori }}</h2>
                </div>
        </div>
            <div class="content-detached content-left">
                <div class="content-body">
                    <!-- Blog Detail -->
                    <div class="blog-detail-wrapper">
                        <div class="row">
                        <!-- Blog -->

                            <div class="col-md-12">
                                <div class="card">
                                    <div class="col-md-12">
                                        <img
                                        src="{{asset('images/'.$ulo->cover_kategori)}}" alt="{{$ulo->nama_kategori}}"
                                        class="img-fluid card-img-top"
                                    />
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text mb-2">
                                            {!! $ulo->deskripsi_kategori !!}
                                        </p>

                                        <section id="card-demo-example">
                                            <div class="row match-height">
                                                @foreach($datas as $item)
                                                    @if($ulo->id==$item->kategori_id)
                                                    <div class="col-md-6 col-lg-4">
                                                        <div class="card border">
                                                            <img class="img-fluid" src="{{asset('images/'.$item ->gambar_ulos)}}" alt="" style="width:400px; height:300px;">
                                                          <div class="card-body">
                                                            <h4 class="card-title text-center">{{$item->nama_ulos}}</h4>
                                                            
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
                                                            <div class="card-text text12">{!! $item->deskripsi_ulos !!}</div>
                                                            <a href="{{ route('ulos.show',$item->id) }}" class="card-link">Lihat Detail</a>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </section>
                                        <hr>


                                        <div class="row justify-content-center my-2">
                                            <div class="col-md-12">
                                                <h4 class="my-2">Gambar Ulos dengan kategori {{$ulo->nama_kategori}}</h4>
                                                <div class="">
                                                    <div class="d-flex flex-wrap justify-content-center">
                                                        
                                                        @foreach($data as $info)
                                                        @if ($ulo->id==$info->id_kategori)
                                                        <div class="card mx-1">
                                                            <div class="border-body">
                                                                <img class="img-fluid" src="{{asset('images/'.$info->gambar)}}" alt="{{$info->nama_ulos}}" style="width:245px;"/>
                                                            </div>
                                                            <p class="text-center">{{$info->nama_ulos}}</p>
                                                        </div>
                                                        @endif
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                            <a class="btn btn-danger waves-effect waves-float waves-light " href="{{ url('dashboard/kategori') }}" ><i data-feather='chevron-left'></i></a>
                    </div>
                    <!--/ Blog -->
                </div>
            </div>


    {{-- Side Right --}}
    <div class="sidebar-detached sidebar-right">
        <div class="sidebar">
            <div class="blog-sidebar">
            @foreach ($items as $item)
            <div class="blog-recent-posts mt-3">
                <h6 class="section-label"></h6>
                <div class="mt-75">
                    <div class="d-flex mb-2">
                        <a href="{{ route('kategori.show',$item->id) }}" class="me-2">
                            <img
                                class="rounded"
                                src="{{asset('images/'.$item->cover_kategori)}}" alt="{{$item->nama_kategori}}"
                                width="100"
                                height="70"
                            />
                        </a>
                        <div class="blog-info">
                            <h6 class="blog-recent-post-title">
                                <a href="{{ route('kategori.show',$item->id) }}" class="text-body-heading">{{ $item->nama_kategori }}</a>
                            </h6>
                            <div class="text-muted mb-0">{{ $ulo->updated_at }}</div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            
            <!--/ Recent Posts -->
        </div>
    </div>
    {{-- Side Right --}}
</div>
    </div>
</div>
@endsection