@extends('app')

@section('title', 'タグ一覧')

@section('content')
  @include('nav')
  <div class="container">
    <div class="card-body text-center">
      <h2 class="h3 card-title text-center mt-4">人気タグ TOP5</h2>
    </div>
    <div class="card m-1 p-3 d-flex flex-row flex-wrap">
      @foreach($tags as $tag)
        <div class="card-body pt-0 pb-4 pl-3">
          <div class="card-text line-height">
            <a href="{{ route('tags.show', ['name' => $tag->name]) }}" class="border p-1 mr-1 mt-1 text-muted">
            </a>
          </div>
        </div>
      @endforeach
    </div>

    <div class="card-body text-center">
      <h2 class="h3 card-title text-center mt-4">タグ検索</h2>
    </div>
    <nav class="navbar navbar-light">
      <form method="GET" action="{{ route('tags.index') }}" class="form-inline  mx-auto">
        <input class="form-control mr-sm-2" name="search" type="search" placeholder="検索" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">タグを検索する</button>
      </form>
    </nav>

    <div class="card-body text-center">
      <h2 class="h3 card-title text-center mt-4">タグ一覧</h2>
    </div>
    <div class="card m-1 p-3 d-flex flex-row flex-wrap">
      @foreach($tags as $tag)
        <div class="card-body pt-0 pb-4 pl-3">
          <div class="card-text line-height">
            <a href="{{ route('tags.show', ['name' => $tag->name]) }}" class="border p-1 mr-1 mt-1 text-muted">
              {{ $tag->name }}
            </a>
          </div>
        </div>
      @endforeach
    </div>
  </div>
@endsection
