<div class="card mt-3">
  <div class="card-body">
    <div class="d-flex flex-row">
      <a href="{{ route('users.show', ['name' => $user->name]) }}" class="text-dark">
        @if ($user->image_path)
          <img src="{{ $user->image_path }}"　class="img-fluid mr-1">
        @else
          <i class="fas fa-user-circle fa-3x mr-1"></i>
        @endif
      </a>
      @if( Auth::id() === $user->id && Auth::id() !== 17 )
        <a class="btn btn-primary ml-auto" href="{{ route('users.edit', ['name' => $user->name]) }}" role="button">ユーザー情報の編集</a>
      @endif

      @if( Auth::id() === 17 )
        <a class="btn btn-primary ml-auto" role="button">ゲストユーザーの編集はできません</a>
      @endif

      @if( Auth::id() !== $user->id )
        <follow-button
          class="ml-auto"
          :initial-is-followed-by='@json($user->isFollowedBy(Auth::user()))'
          :authorized='@json(Auth::check())'
          endpoint="{{ route('users.follow', ['name' => $user->name]) }}"
        >
        </follow-button>
      @endif
    </div>
    <h2 class="h5 card-title m-0">
      <a href="{{ route('users.show', ['name' => $user->name]) }}" class="text-dark">
        {{ $user->name }}
      </a>
    </h2>
  </div>
  <div class="card-body">
    <div class="card-text">
      <a href="{{ route('users.followings', ['name' => $user->name]) }}" class="text-muted">
        {{ $user->count_followings }} フォロー
      </a>
      <a href="{{ route('users.followers', ['name' => $user->name]) }}" class="text-muted">
        {{ $user->count_followers }} フォロワー
      </a>
    </div>
  </div>
</div>
