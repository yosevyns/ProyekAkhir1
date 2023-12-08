@extends('theme.admin.main')

@section('title')
Galeri Ulos
@endsection

@section('content')
<div class="app-content content ">
    <div class="content-wrapper container-xxl p-0">
        <div class="content-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="my-2 mx-2">Foto Ulos</h2>
                            
                        </div>
                        <div class="row justify-content-center m-2">
                            <div class="col-md-12">
                                <div class="">
                                    <div class="d-flex flex-wrap justify-content-center">
                                        @foreach($data as $post)
                                            @if($post->status==1)
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

                                        @foreach($data as $item)
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection