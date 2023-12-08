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
            <section class="app-user-list">
                <div class="row">
                  <div class="col-lg-3 col-sm-6">
                    <div class="card">
                      <div class="card-body d-flex align-items-center justify-content-between">
                        <div>
                          <h3 class="fw-bolder mb-75">{{$jumlah}}</h3>
                          <span>Total User</span>
                        </div>
                        <div class="avatar bg-light-primary p-50">
                          <span class="avatar-content">
                            <i data-feather="user" class="font-medium-4"></i>
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- list and filter start -->
                <div class="card">
                    <div class="card-header">
                        <h1 class="card-title">User</h1>
                    </div>
                  <div class="row justify-content-center m-2">
                    <div class="card-datatable table-responsive">
                        <table class="user-list-table table mb-3">
                          <thead class="table-light">
                            <tr class="text-center">
                              <th>No</th>
                              <th>email</th>
                              <th>Nama</th>
                              <th>Role</th>
                              <th>Tanggal Pembuatan</th>
                              <th>Aksi</th>
                            </tr>
                          </thead>
                          <tbody class="table">
                              @foreach ($data as $index => $item)
                              <tr class="text-center">
                                <td>{{$index + $data ->firstItem() }}</td>
                                <td>{{$item->email}}</td>
                                <td>{{$item->name}}</td>
                                <td class="text-center"><p class="badge badge-light-danger">{{$item->role}}</div></td>
                                <td>{{$item->created_at}}</td>
                                <td>
                                    {{-- <div class="row justify-content-center">
                                        <form action="{{route('user.destroy', $item->id)}}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-outline-danger" onclick="return confirm('Apakah ingin mengahapus data {{$item->name}}');"><i data-feather='trash'></i> </button>
                                        </form>
                                    </div> --}}
                                    <div class="d-inline-flex">
                                      <a class="pe-1 dropdown-toggle hide-arrow text-primary" data-bs-toggle="dropdown" aria-expanded="false">
                                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical font-small-4">
                                              <circle cx="12" cy="12" r="1"></circle>
                                              <circle cx="12" cy="5" r="1">
                                              </circle><circle cx="12" cy="19" r="1"></circle>
                                          </svg>
                                      </a>
                                      <div class="dropdown-menu dropdown-menu-end" style="">
                                          {{-- <a href="{{ route('user.edit',$item->id) }}" class="dropdown-item delete-record">
                                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit font-small-4">
                                                  <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                                  <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                              </svg> Edit
                                          </a> --}}
                                          <form action="{{route('user.destroy', $item->id)}}" method="post">
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
                                </td>
                              <tr>
                              @endforeach
                            
                            </tr>
                          </thead>
                        </table>
                        <div>
                          {{$data->links()}}
                      </div>
                      </div>
                  </div>

                </div>
                <!-- list and filter end -->
              </section>
        </div>
    </div>
</div>
@include('sweetalert::alert')
<script src="{{asset('app-assets/js/scripts/pages/app-user-list.min.js')}}"></script>
@endsection