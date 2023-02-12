@extends('admin.layouts.layout')

@section('categories')
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
              <h4>Edit</h4>
            </div>
            <div class="card-body">
              <form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Name UZ</label>
                <div class="col-sm-12 col-md-7">
                  <input type="text" class="form-control" name="name_uz" value="{{ $category->name_uz }}">
                </div>
              </div>

              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Name Ru</label>
                <div class="col-sm-12 col-md-7">
                  <input type="text" class="form-control" name="name_ru" value="{{ $category->name_ru }}">
                </div>
              </div>

              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Meta title</label>
                <div class="col-sm-12 col-md-7">
                  <input type="text" class="form-control @error('meta_title') is-invalid
                  @enderror" name="meta_title" value="{{ $category->meta_title }}">
                  @error('meta_title') <div class="indvalid-feedback">{{ $message }}</div> @enderror
                </div>
              </div>

              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Meta description</label>
                <div class="col-sm-12 col-md-7">
                  <input type="text" class="form-control @error('meta_description') is-invalid
                  @enderror" name="meta_description" value="{{ $category->meta_description }}">
                  @error('meta_description') <div class="indvalid-feedback">{{ $message }}</div> @enderror
                </div>
              </div>

              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Meta keywords</label>
                <div class="col-sm-12 col-md-7">
                  <input type="text" class="form-control @error('meta_keywords') is-invalid
                  @enderror" name="meta_keywords" value="{{ $category->meta_keywords }}">
                  @error('meta_keywords') <div class="indvalid-feedback">{{ $message }}</div> @enderror
                </div>
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
