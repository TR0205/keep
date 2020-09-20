@extends('app')

@section('title', 'タグ一覧')

@section('content')
  @include('nav')
  <div class="container">
    <div class="card mt-3">
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
@endsection