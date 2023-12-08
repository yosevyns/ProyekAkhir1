@extends('theme.admin.main')

@section('title')
Ubah Informasi Ulos
@endsection

<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
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
                        <form action="{{ route('ulos.update', $ulo->id) }}" method="post" enctype="multipart/form-data">
                            @method('PUT')  
                          @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="nama_ulos">Nama Ulos</label>
                                        <input
                                        type="text"
                                        id="nama_ulos"
                                        class="form-control  @error('nama_ulos')is-invalid @enderror"
                                        name="nama_ulos"
                                        placeholder="(ulos dasum, ulos ragi hotang, dll)"
                                        value="{{ $ulo->nama_ulos }}"
                                        />
                                        @error('nama_ulos')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-1">
                                        <img
                                        src="/images/{{ $ulo->gambar_ulos }}"
                                        class="img-fluid card-img-top"
                                        / style="width: 20%;"><br>
                                        <label class="form-label" for="gambar_ulos">Gambar Ulos</label>
                                        <input
                                        type="file"
                                        id="gambar_ulos"
                                        class="form-control  @error('gambar_ulos')is-invalid @enderror"
                                        name="gambar_ulos"
                                        value="{{ $ulo->gambar_ulos }}"
                                        />
                                        
                                        @error('gambar_ulos')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label for="deskripsi_ulos">Deskripsi</label>
                                    <textarea id="summernote" name="deskripsi_ulos" >{!! $ulo->deskripsi_ulos !!}</textarea>
                                    @error('deskripsi_ulos')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                    @enderror
                                </div>
                                <div class="col-12">
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
<script>
    $('#summernote').summernote({
          placeholder: 'Deskripsi',
          tabsize: 2,
          height: 250
        });
    </script>
@endsection