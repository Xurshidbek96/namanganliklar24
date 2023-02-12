@extends('admin.layouts.layout')

@section('posts')
active
@endsection

@section('content')
<section class="section">
    <div class="section-body">
      <div class="row">
        <div class="col-12">

          <div class="card">
            <div class="card-header">
              <h4>Show Product</h4>
              <a href="{{ route('posts.index') }}" class="btn btn-primary" style="position:absolute; right:50;">Back</a>
            </div>

            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped" id="table-1">
                  <thead>
                    <tr>
                        <td>Nomi UZ: </td>
                        <td><b>{{ $post->title_uz }}</b></td>
                    </tr>

                    <tr>
                        <td>Nomi EN: </td>
                        <td><b>{{ $post->title_ru }}</b></td>
                    </tr>

                    <tr>
                        <td>Kategoriyasi UZ : </td>
                        <td><b>{{ $post->category->name_uz }}</b></td>
                    </tr>

                    <tr>
                        <td> Teglar : </td>
                        <td><b>@foreach( $post->tags as $item)
                            {{ $item->name_uz}} , 
                        @endforeach

                        </b></td>
                    </tr>

                    <tr>
                        <td>Kategoriyasi Ru : </td>
                        <td><b>{{ $post->category->name_ru }}</b></td>
                    </tr>

                    <tr>
                        <td>Ma'lumotlar UZ: </td>
                        <td><b>{!! $post->body_uz !!}</b></td>
                    </tr>

                    <tr>
                        <td>Ma'lumotlar EN: </td>
                        <td><b>{!! $post->body_ru !!}</b></td>
                    </tr>


                    <tr>
                        <td>Rasmi : </td>
                        <td>
                          <img alt="image" src="/images/{{ $post->img }}" width="59">
                        </td>
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
