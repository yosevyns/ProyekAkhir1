@extends('theme.admin.main')

@section('title')
Sejarah Ulos
@endsection

@section('content')
<div class="app-content content ">
    <div class="container">
        <div class="content-overlay"></div>
        <div class="content-wrapper container row my-3">
                <div class="col-12 d-flex justify-content-between">
                    <h2 class="content-header">Sejarah Ulos</h2>
                    @auth
                        @if(Auth::user()->role=="admin")
                            @if($info==NULL)
                            <a href="{{route('sejarah.create')}}" class="btn btn-primary align-self-center">Tambah Sejarah</a>
                            @endif
                        @endif
                    @endauth
                </div>
        </div>
        @foreach ($data as $item)
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
                                        {!! $item->deskripsi_ulos !!}
                                    </p>
                                    @auth
                                    @if(Auth::user()->role=='admin')
                                    <div class="d-flex justify-content-center">
                                        <a class="btn btn-warning mx-1" href="{{ route('sejarah.edit',$item->id) }}"><i data-feather='edit'></i> Edit</a>
                                    </div>
                                    @endif
                                    @endauth
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ Blog -->
            </div>
        </div>
        @endforeach
                
</div>
    </div>
</div>
@include('sweetalert::alert')
@endsection