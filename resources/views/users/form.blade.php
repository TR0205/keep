@csrf
<div class="md-form">
  <label for="name">ユーザー名</label>
  <input class="form-control" type="text" id="name" name="name" required value="{{ $user->name ?? old('name') }}">
  <small>英数字3〜16文字(登録後の変更はできません)</small>
</div>

<div class="md-form">
  <label for="email">メールアドレス</label>
  <input class="form-control" type="text" id="email" name="email" required value="{{ $user->email ?? old('email') }}" >
</div>

<div class="md-form">
  <div class="text-left">
    <a href="{{ route('password.request') }}" class="card-text">パスワードの再設定はこちら</a>
  </div>
</div>

<!-- 画像アップロード -->
<div class="form-group">
  <label for="exampleFormControlFile1">プロフィール画像のアップロード</label>
    <input type="file" class="form-control-file" name="image">
</div>

<!-- <div class="form-group">
  <label></label>
  <textarea name="body" required class="form-control" rows="16" placeholder="本文">{{ $article->body ?? old('body') }}</textarea>
</div> -->
