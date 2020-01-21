@extends('layouts.app')

@section('content')

<div class="row">
  <h1>お問い合わせ内容の確認</h1>
</div>
<div class="row">
  <p>下記、お問い合わせ内容にて送信します。よろしければ「送信」ボタンを押してください。</p>

  <table class="table table-bordered">
    <tr>
      <td class="table-secondary" style="width:20%">お名前</td>
      <td>{{ $name }}</td>
    </tr>

    <tr>
      <td class="table-secondary">メールアドレス</td>
      <td>{{ $email }}</td>
    </tr>

    <tr>
      <td class="table-secondary" style="width:20%">お問い合わせ内容</td>
      <td>{{!! nl2br(e($post)) !!}}</td>
    </tr>

  </table>
  <form action="send" method="post">
    <input type="hidden" name="name" id="InputName" value="{{ $name }}">
    <input type="hidden" name="email" id="Inputemail" value="{{ $email }}">
    <input type="hidden" name="post" id="InputPost" value="{{ $post }}">
  @csrf
  <button type="submit" name="action" class="btn btn-primary" value="back">戻る</button>
  <button type="submit" name="action" class="btn btn-primary" value="send">送信</button>
  </form>
</div>
@endsection
