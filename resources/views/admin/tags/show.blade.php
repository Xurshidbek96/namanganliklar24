@extends('admin.layouts.layout')

@section('tags')
active
@endsection

@section('content')
<section class="section">
    <div class="section-body">
      <div class="row">
        <div class="col-12">

          <div class="card">
            <div class="card-header">
              <h4>Show Category</h4>
              <a href="{{ route('tags.index') }}" class="btn btn-primary" style="position:absolute; right:50;">Back</a>
            </div>

            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped" id="table-1">
                  <thead>
                    <tr>
                        <td>Nomi : </td>
                        <td><b>{{ $tag->name_uz }}</b></td>
                    </tr>

                    <tr>
                        <td>Nomi : </td>
                        <td><b>{{ $tag->name_ru }}</b></td>
                    </tr>

                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection
