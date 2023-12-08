@extends('theme.admin.main')

@section('title')
Ubah Ulos dan Kategori
@endsection

@section('content')
<div class="app-content content ">
    <div class="content-wrapper container-xxl p-0">
        <div class="content-body">
            <section id="basic-vertical-layouts">
                <div class="row">
                  <div class="col-md-10 col-12">
                    <div class="card">
                      <div class="card-header">
                        <h4 class="card-title">Ulos</h4>
                      </div>
                        <div class="card-body">
                            <form action="{{ route('haskategori.update',$haskategori->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-12">
                                        <div class="control-group  my-1" >
                                            <label class="form-label" for="kategori_id">Kategori Ulos</label>
                                            <select name="kategori_id" class="form-control @error('kategori_id')is-invalid @enderror">
                                                <option value="{{$haskategori->kategori_id}}">Pilih</option>
                                                @foreach ($data as $item)
                                                    <option value="{{$item->id}}">{{$item->nama_kategori}}</option>
                                                @endforeach
                                            </select>
                                            @error('kategori_id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="col-12 ">
                                        <div class="control-group  my-1" >
                                            <label class="form-label" for="ulos_id">Nama Ulos</label>
                                            <select name="ulos_id" class="form-control @error('ulos_id')is-invalid @enderror">
                                                <option value="{{$haskategori->ulos_id}}">Pilih</option>
                                                @foreach ($ulo as $item)
                                                    <option value="{{$item->id}}">{{$item->nama_ulos}}</option>
                                                @endforeach
                                            </select>
                                            @error('ulos_id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
 
                                    
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary me-1">Edit</button>
                                        <a href="{{url('haskategori')}}" class="btn btn-outline-secondary">Batal</a>
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
@include('sweetalert::alert')
@endsection