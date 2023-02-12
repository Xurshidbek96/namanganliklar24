@extends('admin.layouts.layout')

@section('css')
    <link rel="stylesheet" href="/admin/assets/bundles/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="/admin/assets/bundles/jquery-selectric/selectric.css">
@endsection

@section('posts')
    active
@endsection

@section('content')


@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<section class="section">
    <div class="section-body">

      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Post qo'shish</h4>
            </div>
            <div class="card-body">
              <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Post Nomi Uz</label>
                <div class="col-sm-12 col-md-7">
                  <input type="text" class="form-control @error('title_uz') is-invalid
                  @enderror" name="title_uz" value="{{ old('title_uz') }}">
                   @error('title_uz') <div class="indvalid-feedback">{{ $message }}</div> @enderror
                </div>
              </div>

              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Post Nomi Ru</label>
                <div class="col-sm-12 col-md-7">
                  <input type="text" class="form-control @error('title_ru') is-invalid
                  @enderror" name="title_ru" value="{{ old('title_ru') }}">
                   @error('title_ru') <div class="indvalid-feedback">{{ $message }}</div> @enderror
                </div>
              </div>

              <div class="form-group row mb-4">
                      <div class="control-label col-form-label text-md-right col-12 col-md-3 col-lg-3">Special</div>
                      <label class="custom-switch mt-2">
                        <input type="checkbox" name="special" value="1" class="custom-switch-input">
                        <span class="custom-switch-indicator"></span>

                      </label>
                    </div>

              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Katgoriyasi</label>
                <div class="col-sm-12 col-md-7">
                  <select class="form-control selectric" name="category_id">
                    @foreach ($categories as $item)
                        <option value="{{ $item->id }}">{{ $item->name_uz }}</option>
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Teglar</label>
                <div class="col-sm-12 col-md-7">
                  <select class="form-control select2" name="tags[]" multiple>
                    @foreach ($tags as $item)
                        <option value="{{ $item->id }}">{{ $item->name_uz }}</option>
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Mazmuni UZ</label>
                <div class="col-sm-12 col-md-7">
                  <textarea class="form-control @error('body_uz') is-invalid
                  @enderror" name="body_uz" value="{{ old('body_uz') }}"></textarea>
                  @error('body_uz') <div class="indvalid-feedback">{{ $message }}</div> @enderror
                </div>
              </div>

              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Mazmuni Ru</label>
                <div class="col-sm-12 col-md-7">
                    <textarea class="form-control @error('body_uz') is-invalid
                    @enderror" name="body_ru" value="{{ old('body_ru') }}"></textarea>
                  @error('info_ru') <div class="indvalid-feedback">{{ $message }}</div> @enderror
                </div>
              </div>

              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Rasm</label>
                <div class="col-sm-12 col-md-7">
                  <div id="image-preview" class="image-preview">
                    <label for="image-upload" id="image-label">Rasmni tanlang</label>
                    <input type="file" name="img" id="image-upload" />
                  </div>
                  @error('img') <div class="indvalid-feedback">{{ $message }}</div> @enderror
                </div>
              </div>

              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Meta title</label>
                <div class="col-sm-12 col-md-7">
                  <input type="text" class="form-control @error('meta_title') is-invalid
                  @enderror" name="meta_title" value="{{ old('meta_title') }}">
                  @error('meta_title') <div class="indvalid-feedback">{{ $message }}</div> @enderror
                </div>
              </div>

              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Meta description</label>
                <div class="col-sm-12 col-md-7">
                  <input type="text" class="form-control @error('meta_description') is-invalid
                  @enderror" name="meta_description" value="{{ old('meta_description') }}">
                  @error('meta_description') <div class="indvalid-feedback">{{ $message }}</div> @enderror
                </div>
              </div>

              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Meta keywords</label>
                <div class="col-sm-12 col-md-7">
                  <input type="text" class="form-control @error('meta_keywords') is-invalid
                  @enderror" name="meta_keywords" value="{{ old('meta_keywords') }}">
                  @error('meta_keywords') <div class="indvalid-feedback">{{ $message }}</div> @enderror
                </div>
              </div>

              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                <div class="col-sm-12 col-md-7">
                  <button class="btn btn-primary">Submit</button>
                </div>
              </div>
              </form>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section>

@endsection

@section('js')
    <script src="//cdn.ckeditor.com/4.19.0/standard/ckeditor.js"></script>
    {{--
    <script>
        $('ckeditor').ckeditor();
    </script> --}}

    <script>
        CKEDITOR.replace('body_uz', {
        filebrowserUploadUrl: "{{route('admin.upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
        });
        CKEDITOR.replace('body_ru', {
        filebrowserUploadUrl: "{{route('admin.upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
        });
    </script>
    <script src="/admin/assets/bundles/select2/dist/js/select2.full.min.js"></script>
@endsection

