@extends('theme.admin.main')

@section('title')
Tambah Foto Ulos
@endsection

<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<link rel="stylesheet" type="text/css" href="/app-assets/css/core/menu/menu-types/vertical-menu.min.css">



@section('content')
<div class="app-content content ">
    <div class="content-wrapper container-xxl p-0">
        <div class="content-body">
            <section id="basic-vertical-layouts">
                <div class="row">
                  <div class="col-md-10 col-12">
                    <div class="card">
                      <div class="card-header">
                        <h4 class="card-title">Tambah Data</h4>
                      </div>
                        <div class="card-body">
                            <form action="{{route('galeri.store')}}" method="post" enctype="multipart/form-data" id="imgae-upload">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="mb-1">
                                            <select class="select2 form-select @error('ulos_id')is-invalid @enderror" id="select2-basic" name="ulos_id">
                                                {{-- @if($data->ulos_id !="Sejarah Ulos") --}}
                                                <option value=""> Pilih</option>
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
                                            <input type="file" name="gambar" class="form-control @error('gambar')is-invalid @enderror">
                                            <div class="img-holder"></div>
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
<script src="{{ asset('js.jquery-min.js') }}"></script>
<script>
    $(function(){
        $('input[type="file"][name="gambar"]').val('');
        $('input[type="file"][name="gambar"]').on('change', function(){
            var img_path = $(this)[0].value;
            var img_holder = $('.img-holder');
            var extension = img_path.substring(img_path.lastIndexOf('.')+1).toLowerCase();

            if(extension=="jpeg"||extension=="jpg"||extension=="png"||extension=="svg"){
                if(typeof(FileReader) != 'undefined'){
                    img_holder.empty();
                    var reader = new FileReader();
                    reader.onload = function(e){
                        $('<img/>', ('src':e.target.result, 'class':'img-fluid', 'style':'max-width:100px;margin-bottom:10px;')).appendTo('img_holder');
                    }
                    img_holder.show();
                    reader.readAsDataURL($(this)[0].files[0])
                }else{
                    $('img_holder').html('This browser does not support file reader')
                }
            }else{
                $('img_holder').empty();
            }

        });
    })


  $('#summernote').summernote({
    placeholder: 'Deskripsi',
    tabsize: 2,
    height: 250
  });
  </script>

@endsection