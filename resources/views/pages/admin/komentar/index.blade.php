@extends('theme.admin.main')

@section('title')
Komentar
@endsection

@section('content')
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
      <div class="content-body">
          <div class="row">
              @auth
              <div class="col-lg-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Buat Komentar</h4>
                    </div>
                    <div class="card-body">
                        <form class="form form-horizontal" action="{{ route('comment.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-1 row">
                                        <div class="col-sm-2">
                                            <label class="col-form-label" for="fname-icon" style="display:block;">Komentar</label>
                                        </div>
                                        <div class="col-sm-10">
                                            <div class="input-group">
                                                <textarea name="deskripsi" class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="d-flex justify-content-end">
                                        <button type="submit" class="btn btn-sm btn-info mx-1">Kirim</button>
                                        <button type="reset" class="btn btn-sm btn-outline-danger mx-1">Batal</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
              @endauth
              <div class="@auth col-lg-12 col-12 @else col-md-12 @endauth">
                  <div class="card">
                      <div class="card-header">
                          <h4 class="card-title">Komentar</h4>
                      </div>
                      <div class="card-body">
                          @foreach($comment as $data)
                              <div class="card-body">
                                  <section class="border">
                                    <div class="m-1">
                                        <div class="d-flex justify-content-start align-items-center mb-1">
                                            <!-- avatar -->
                                            <!--/ avatar -->
                                            <div class="profile-user-info">
                                                <h6 class="mb-0" style="font-size: 12px;">{{ $data->user->username }}</h6>
                                                <small class="text-muted" style="font-size: 10px;">{{ \App\Helpers\Helper::convertDate($data->created_at) }}</small>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <p class="card-text">
                                                {{$data->deskripsi}}
                                            </p>
                                            @auth
                                            @if(Auth::user()->role=="admin"|| Auth::user()->id == $data->user_id)
                                            <div class="d-inline-flex">
                                                <a class="pe-1 dropdown-toggle hide-arrow text-info" data-bs-toggle="dropdown" aria-expanded="false" >
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical font-small-4">
                                                        <circle cx="12" cy="12" r="1"></circle>
                                                        <circle cx="12" cy="5" r="1">
                                                        </circle><circle cx="12" cy="19" r="1"></circle>
                                                    </svg>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end" style="">
                                                    
                                                    <form action="{{ route('comment.destroy',$data->id) }}" method="post">
                                                        @csrf
                                                        @method("DELETE")
                                                        <button type="submit" class="dropdown-item">
                                                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 font-small-4 me-50">
                                                              <polyline points="3 6 5 6 21 6"></polyline>
                                                              <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                              <line x1="10" y1="11" x2="10" y2="17"></line>
                                                              <line x1="14" y1="11" x2="14" y2="17"></line>
                                                          </svg>Hapus
                                                      </button>
                                                        </form>
                                                </div>
                                            </div>
                                            @endif
                                            @endauth
                                        </div>
                                        
                                        <!-- like share -->
                                        @php
                                         $replies = \App\Models\Comment::where('parent_komentar_id', $data->id)->get(); 
                                        @endphp
                                        <!-- comments -->
                                        @foreach ($replies as $reply)
                                        <div class="d-flex align-items-start mb-1">
                                            <div class="profile-user-info w-100">
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <h6 class="mb-0 mx-1" style="font-size: 12px;" style="font-size: 10px;">{{ $reply->user->username }}</h6>
                                                </div>
                                                
                                                <div class="d-flex justify-content-between">
                                                    <small class="card-text mx-1">
                                                        {{$reply->deskripsi}}
                                                        
                                                    </small>
                                                    <hr>
                                                    @auth
                                                    @if(Auth::user()->role=="admin"|| Auth::user()->id == $reply->user_id)
                                                    <div class="d-inline-flex">
                                                        <a class="pe-1 dropdown-toggle hide-arrow text-info" data-bs-toggle="dropdown" aria-expanded="false" >
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical font-small-4">
                                                                <circle cx="12" cy="12" r="1"></circle>
                                                                <circle cx="12" cy="5" r="1">
                                                                </circle><circle cx="12" cy="19" r="1"></circle>
                                                            </svg>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-end" style="">
                                                            
                                                            <form action="{{ route('comment.destroy',$reply->id) }}" method="post">
                                                                @csrf
                                                                @method("DELETE")
                                                                <button type="submit" class="dropdown-item">
                                                                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 font-small-4 me-50">
                                                                      <polyline points="3 6 5 6 21 6"></polyline>
                                                                      <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                                      <line x1="10" y1="11" x2="10" y2="17"></line>
                                                                      <line x1="14" y1="11" x2="14" y2="17"></line>
                                                                  </svg>Hapus
                                                              </button>
                                                                </form>
                                                        </div>
                                                    </div>
                                                    @endif
                                                    @endauth
        
                                                </div>
                                               
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                  </section>
                                  <!--/ comments -->

                                  <!-- comment box -->
                                  @auth
                                  <button class="btn btn-sm btn-info my-1" type="button" data-bs-toggle="collapse" data-bs-target="#reply-{{ $data->id }}" aria-expanded="false" aria-controls="reply-{{ $data->id }}">
                                    Balas
                                </button>
                                    <div class="collapse" id="reply-{{ $data->id }}">
                                        <form action="{{ route('comment.reply', $data->id) }}" method="POST">
                                            @csrf
                                            <fieldset class="mb-75">
                                                <label class="form-label" for="label-textarea">Balas Komentar</label>
                                                <textarea name="deskripsi" class="form-control @error('deskripsi')is-invalid @enderror" id="label-textarea" rows="3" placeholder="Add deskripsi"></textarea>
                                                @error('deskripsi')
                                                <div class="invalid-feedback">
                                                {{ $message }}
                                                </div>
                                                @enderror
                                            </fieldset>
                                            <button type="sumbit" class="btn btn-sm btn-info waves-effect waves-float waves-light">Kirim</button>
                                        </form>
                                    </div>
                                  @endauth
                              </div>
                              <hr>
                          @endforeach
                      </div>
                  </div>
              </div>
          </div>
      </div>
    </div>
  </div>
  @include('sweetalert::alert')

@endsection