@extends('admin.layouts.layout')

@section('tags')
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
              <h4>Teg qo'shish</h4>
            </div>
            <div class="card-body">
              <form action="{{ route('tags.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"> Nomi UZ</label>
                <div class="col-sm-12 col-md-7">
                  <input type="text" class="form-control @error('name_uz') is-invalid
                  @enderror" name="name_uz" value="{{ old('name_uz') }}">
                   @error('name_uz') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
              </div>

              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"> Nomi Ru</label>
                <div class="col-sm-12 col-md-7">
                  <input type="text" class="form-control @error('name_ru') is-invalid
                  @enderror" name="name_ru" value="{{ old('name_ru') }}">
                   @error('name_ru') <div class="invalid-feedback">{{ $message }}</div> @enderror
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

