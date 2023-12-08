@extends('theme.admin.main')
@section('title')
Data Kategori Ulos
@endsection
@section('content')


<div class="app-content content">
    <div class="content-wrapper container-xxl p-0">
        <div class="content-body">
            <div class="row" id="basic-table">
                <div class="col-lg-6">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h1 class="card-title">Data Kategori Ulos</h1>
                        <a class="btn btn-info" href="{{route('kategori.create')}}" ><i data-feather='plus'></i> Tambah</a>
                    </div>
                    <div class="table-responsive m-5">
                    <div class="col-lg-6">
                        <table class="table text-justify">
                            <thead>
                                <tr class="text-center">
                                    <th>No.</th>
                                    <th>Nama Kategori</th>
                                    <th>Cover</th>
                                    <th>Tanggal Pembuatan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kategori as $index => $item)
                                <tr>
                                        <td>{{$index + $kategori->firstItem()}}</td>
                                        <td>{{$item->nama_kategori}}</td>
                                        <td><img src="{{asset('images/'.$item ->cover_kategori)}}" alt="{{$item->nama_kategori}}" style="width: 100px"/></td>
                                        <td>{{$item->created_at}}</td>
                                        <td>
                                            <div class="d-inline-flex">
                                                <a class="pe-1 dropdown-toggle hide-arrow text-primary" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical font-small-4">
                                                        <circle cx="12" cy="12" r="1"></circle>
                                                        <circle cx="12" cy="5" r="1">
                                                        </circle><circle cx="12" cy="19" r="1"></circle>
                                                    </svg>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end" style="">
                                                    <a class="dropdown-item delete-record" href="{{route('kategori.show', $item->id)}}"><i data-feather='eye'></i> Lihat</a>
                                                    <a href="{{route('kategori.edit', $item->id)}}" class="dropdown-item delete-record">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit font-small-4">
                                                            <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                                            <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                                        </svg> Edit
                                                    </a>
                                                    <form action="{{route('kategori.destroy',$item->id)}}" method="post">
                                                      @csrf
                                                      @method('DELETE')
                                                      <button type="submit" class="dropdown-item delete-record">
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
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        
                        <div class="row justify-content-center my-10">
                            <div>
                                {{$kategori->links()}}
                            </div>
                        </div>
                    </div>
                    </div>

                </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="card-title">Tabel Ulos</h1>
                            <a class="btn btn-info" href="{{route('haskategori.create')}}" ><i data-feather='plus'></i> Tambah</a>
                        </div>
                        <div class="table-responsive m-5" >
                        <div class="col-lg-6 " >
                            <table class="table text-justify">
                                <thead>
                                    <tr class="text-center">
                                        <th>No.</th>
                                        <th>Nama Kategori</th>
                                        <th>Nama Ulos</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $index => $item)
                                    <tr>
                                            <td>{{$index + $data->firstItem()}}</td>
                                            <td>{{$item->nama_kategori}}</td>
                                            <td>{{$item->nama_ulos}}</td>
                                            <td>
                                                <div class="d-inline-flex">
                                                    <a class="pe-1 dropdown-toggle hide-arrow text-primary" data-bs-toggle="dropdown" aria-expanded="false" >
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical font-small-4">
                                                            <circle cx="12" cy="12" r="1"></circle>
                                                            <circle cx="12" cy="5" r="1">
                                                            </circle><circle cx="12" cy="19" r="1"></circle>
                                                        </svg>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-end" style="">
                                                        
                                                        <a href="{{route('haskategori.edit', $item->id)}}" class="dropdown-item">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit font-small-4">
                                                                <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                                                <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                                            </svg> Edit
                                                        </a>
                                                        <a class="dropdown-item delete-record" data-bs-toggle="modal" data-bs-target="#staticBackdrop{{$loop->iteration}}">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 font-small-4 me-50">
                                                                <polyline points="3 6 5 6 21 6"></polyline>
                                                                <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                                <line x1="10" y1="11" x2="10" y2="17"></line>
                                                                <line x1="14" y1="11" x2="14" y2="17"></line>
                                                            </svg>Hapus
                                                        </a>
                                                    </div>
                                                  </div>
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="staticBackdrop{{$loop->iteration}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel{{$loop->iteration}}" aria-hidden="true">
                                            <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel{{$loop->iteration}}">Konfirmasi</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                Apakah Anda ingin menghapusnya?
                                                </div>
                                                <div class="modal-footer">
                                                <button type="button" class="btn btn-info" data-bs-dismiss="modal">Batal</button>
                                                <form action="{{ route('haskategori.destroy',$item->id) }}" method="post">
                                                    @csrf
                                                    @method("DELETE")
                                                    <button type="submit" class="btn btn-danger">
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
                                            </div>
                                    @endforeach
                                </tbody>
                            </table>
                            
                            <div class="row justify-content-center my-10">
                                <div>
                                    {{$data->links()}}
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
@include('sweetalert::alert')
@endsection