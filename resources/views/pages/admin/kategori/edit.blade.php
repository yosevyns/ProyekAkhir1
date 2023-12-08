@extends('theme.admin.main')

@section('title')
Ubah Informasi Kategori
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
                        <form action="{{ route('kategori.update', $kategori->id) }}" method="post" enctype="multipart/form-data">
                            @method('PUT')  
                          @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="nama_kategori">Nama Ulos</label>
                                        <input
                                        type="text"
                                        id="nama_kategori"
                                        class="form-control  @error('nama_kategori')is-invalid @enderror"
                                        name="nama_kategori"
                                        placeholder="(ulos dasum, ulos ragi hotang, dll)"
                                        value="{{ $kategori->nama_kategori }}"
                                        />
                                        @error('nama_kategori')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-1">
                                        <img
                                        src="/images/{{ $kategori->cover_kategori }}"
                                        class="img-fluid card-img-top"
                                        / style="width: 20%;"><br>
                                        <label class="form-label" for="cover_kategori">Gambar Ulos</label>
                                        <input
                                        type="file"
                                        id="cover_kategori"
                                        class="form-control  @error('cover_kategori')is-invalid @enderror"
                                        name="cover_kategori"
                                        value="{{ $kategori->cover_kategori }}"
                                        />
                                        
                                        @error('cover_kategori')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label for="deskripsi_kategori">Deskripsi</label>
                                    <textarea id="summernote" name="deskripsi_kategori" >{!! $kategori->deskripsi_kategori !!}</textarea>
                                    @error('deskripsi_kategori')
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