@extends('app')

@section('title', '記事一覧')

@section('content')
  @include('nav')
    <div class="card-body text-center">
        <h2 class="h3 card-title text-center mt-4">人気のタグ</h2>
      </div>
      <div class="card m-1 p-3 d-flex flex-row flex-wrap">
        @foreach($tags as $tag)
          <div class="card-body pt-0 pb-4 pl-3">
            <div class="card-text line-height">
              <a href="{{ route('tags.show', ['name' => $tag->name]) }}" class="border p-1 mr-1 mt-1 text-muted">
                #{{ $tag->name }}
              </a>
            </div>
          </div>
        @endforeach
      </div>
    </div>

    @foreach($articles as $article)
      @include('articles.card')
    @endforeach
  </div>
@endsection
