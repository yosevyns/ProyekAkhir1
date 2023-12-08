@extends('theme.admin.main')

@section('title')
Ubah Foto Ulos
@endsection

<link rel="stylesheet" type="text/css" href="asset{{('app-assets/css/core/menu/menu-types/vertical-menu.min.css')}}">
@section('content')
<div class="app-content content ">
    <div class="content-wrapper container-xxl p-0">
        <div class="content-body">
            <section id="basic-vertical-layouts">
                <div class="row">
                  <div class="col-md-10 col-12">
                    <div class="card">
                      <div class="card-header">
                        <h4 class="card-title">Ubah Data</h4>
                      </div>
                        <div class="card-body">
                            <form action="{{route('galeri.update', $galeri->id)}}" method="POST" enctype="multipart/form-data">
                                @method('PUT')  
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="mb-1">
                                            <select class="select2 form-select @error('ulos_id')is-invalid @enderror" id="select2-basic" name="ulos_id">
                                                {{-- @if($data->ulos_id !="Sejarah Ulos") --}}
                                                    @foreach($ulo as $item)
                                                    <option value="{{$item->id}}">{{$item->nama_ulos}}</option>
                                                    @endforeach
                                                {{-- @endif --}}
                                              </select>
                                            @error('ulos_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="control-group increment" >
                                            <label class="form-label" for="gambar">Gambar Ulos</label>
                                            <input type="file" name="gambar" class="form-control @error('gambar')is-invalid @enderror" value="{{$galeri->gambar}}">
                                            @error('gambar')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                          </div>
                                    </div>
                                    <div class="col-12 mt-5">
                                        <button type="submit" class="btn btn-primary me-1">Submit</button>
                                        <button type="reset" class="btn btn-outline-secondary">Reset</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                  </div>
                </div>
            </section>
        </div>
    </div>
</div>

@endsection