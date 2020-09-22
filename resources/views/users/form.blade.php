@csrf
<div class="md-form">
  <label for="name">ユーザー名</label>
  <input class="form-control" type="text" id="name" name="name" required value="{{ old('name') }}">
  <small>英数字3〜16文字(登録後の変更はできません)</small>
</div>

<div class="md-form">
  <label for="email">メールアドレス</label>
  <input class="form-control" type="text" id="email" name="email" required value="{{ old('email') }}" >
</div>

<div class="md-form">
  <label for="password">パスワード</label>
  <input class="form-control" type="password" id="password" name="password" required>
</div>
<div class="md-form">
  <label for="password_confirmation">パスワード(確認)</label>
  <input class="form-control" type="password" id="password_confirmation" name="password_confirmation" required>
</div>

<!-- 画像アップロード -->
<div class="form-group">
  <label for="exampleFormControlFile1">プロフィール画像のアップロード</label>
    <input type="file" class="form-control-file" name="image">
</div>

<div class="form-group">
  <label></label>
  <textarea name="body" required class="form-control" rows="16" placeholder="本文">{{ $article->body ?? old('body') }}</textarea>
</div>
