@extends('theme.admin.main')

@section('title')
{{ $ulo->nama_ulos }}
@endsection

@section('content')
<div class="app-content content ">
    <div class="container-xxl content-wrapper">
        <div class="content-overlay"></div>
        <div class="content-wrapper container row">
                <div class="col-12">
                    <h2 class="content-header">{{ $ulo->nama_ulos }}</h2>
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
                                        src="/images/{{ $ulo->gambar_ulos }}"
                                        class="img-fluid card-img-top"
                                    />
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text mb-2">
                                            {!! $ulo->deskripsi_ulos !!}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center m-2">
                                <div class="col-md-12">
                                    <div class="">
                                        <div class="d-flex flex-wrap justify-content-center">
                                            
                                            @foreach($datas as $info)
                                            @if ($ulo->id==$info->ulos_id)
                                            <div class="card mx-1">
                                                <div class="border-body">
                                                    <img class="img-fluid" src="{{asset('images/'.$info->image)}}" alt="{{$info->nama_ulos}}" style="width:245px;"/>
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
                            <a class="btn btn-danger waves-effect waves-float waves-light " href="{{ route('ulos.index') }}" ><i data-feather='chevron-left'></i></a>
                    </div>
                    <!--/ Blog -->
                </div>
            </div>


    {{-- Side Right --}}
    <div class="sidebar-detached sidebar-right">
        <div class="sidebar">
            <div class="blog-sidebar">
            <!-- Recent Posts -->
            
                
            @foreach ($data as $item)
            <div class="blog-recent-posts mt-3">
                <h6 class="section-label"></h6>
                <div class="mt-75">
                    <div class="d-flex mb-2">
                        <a href="{{ route('ulos.show',$item->id) }}" class="me-2">
                            <img
                                class="rounded"
                                src="/images/{{ $item->gambar_ulos }}"
                                width="100"
                                height="70"
                            />
                        </a>
                        <div class="blog-info">
                            <h6 class="blog-recent-post-title">
                                <a href="{{ route('ulos.show',$item->id) }}" class="text-body-heading">{{ $item->nama_ulos }}</a>
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