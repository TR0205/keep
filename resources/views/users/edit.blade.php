@extends('app')

@section('title', 'ユーザー情報更新')

@include('nav')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="card mt-3">
          <div class="card-body pt-0">
            @include('error_card_list')
            <div class="card-text">
              <form method="POST" action="{{ route('users.update', ['name' => $user->name]) }}">
                @include('users.form')
                @method('PATCH')
                <button type="submit" class="btn btn-block text-white" style="background-color: #21a48f;">更新する</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
