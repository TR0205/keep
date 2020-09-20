@extends('app')

@section('title', 'タグ一覧')

@include('nav')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="card m-3 p-3">
          <div class="card-body d-flex flex-row　text-nowrap">
          @foreach($tags as $tag)
          <div class="card-body pt-0 pb-4 pl-1">
            <div class="card-text line-height text-nowrap">
              <a href="{{ route('tags.show', ['name' => $tag->name]) }}" class="border p-1 mr-1 mt-1 text-muted">
                {{ $tag->hashtag }}
              </a>
            </div>
          </div>
          @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection