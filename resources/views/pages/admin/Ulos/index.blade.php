@extends('theme.admin.main')
@section('content')

@section('title')
Ulos Berdasarkan Nama Ulos
@endsection

<div class="app-content content ">
    <div class="content-wrapper container-xxl p-0">
        <div class="content-body">
            <div class="row" id="basic-table">
                <div class="col-12">
                    <div class="card-header">
                        <h1 class="card-title">Nama-Nama Ulos</h1>
                    </div>
                    <div class="table-responsive row  justify-content-center m-2">
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
                            </div>
                        </section>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection