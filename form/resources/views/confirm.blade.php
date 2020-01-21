@extends('layouts.app')

@section('title','お問い合わせ内容の確認')

@section('content')

  <h1>お問い合わせ内容の確認</h1>
  <form method="POST" action="{{ route('thanks') }}">
    @csrf

  <p>下記、お問い合わせ内容にて送信します。よろしければ「送信」ボタンを押してください。</p>
    <table class="table table-bordered">
      <tr>
        <td><label>お名前</label></td>
        <td>{{ $inquiry['name'] }}
        <input
          class="table-secondary"
          type="hidden"
          name="name"
          value="{{ $inquiry['name'] }}"
        ></td>
      </tr>

      <tr>
        <td><label>メールアドレス</label></td>
        <td>{{ $inquiry['email'] }}
        <input
          class="table-secondary"
          type="hidden"
          name="email"
          value="{{ $inquiry['email'] }}"
        ></td>
      </tr>

      <tr>
        <td><label>お問い合わせ内容</label></td>
        <td>{!! nl2br(e($inquiry['post'])) !!}
        <input
          class="table-secondary"
          type="hidden"
          name="post"
          value="{{ $inquiry['post'] }}"
        ></td>
      </tr>
    </table>
      <input type="hidden" name="name" id="InquiryName" value="{{ $inquiry['name'] }}">
      <input type="hidden" name="email" id="Inquirymail" value="{{ $inquiry['email'] }}">
      <input type="hidden" name="post" id="InquiryPost" value="{{ $inquiry['post'] }}">
    <div class="button_wrapper remodal-bg">
      <button type="submit" name="action" value="back" class="btn btn-secondary" id="square_btn" >戻る</button>
      <button type="submit" name="action" value="submit" class="btn btn-primary" id="square_btn" >送信</button>
    </div>
  </form>
@endsection
