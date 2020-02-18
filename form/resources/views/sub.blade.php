@extends('layouts.app')

@section('content')

  <div class="container mt-4">
    <div class="border p-4">
      <h1>お問い合わせ</h1>

      <form method="POST" action="{{route('confirm')}}">
        @csrf
        <fieldset class="mb-4">
          <div class="form-row col-md-2">
            <label for="name">
              お名前
            </label>
            <input
              id="name"
              name="name"
              class="form-control {{ $errors -> has('name')?'is-invalid':''}}"
              type="text"
            >
            @if ($errors -> has('name'))
              <div class="invalid-feedback">
                {{ $errors -> first('name') }}
              </div>
            @endif
          </div>

          <div class="form-row col-md-2">
            <label for="email">
              メールアドレス
            </label>
            <input
              id="email"
              name="email"
              class="form-control {{ $errors -> has('email')?'is-invalid':''}}"
              type="text"
            >
            @if ($errors -> has('email'))
              <div class="invalid-feedback">
                {{ $errors -> first('email') }}
              </div>
            @endif
          </div>

          <div class="form-row col-md-2">
            <label for="post">
              お問い合わせ内容
            </label>
            <textarea
              id="post"
              name="post"
              cols="40"
              rows="7"
              class="form-control {{ $errors -> has('post')?'is-invalid':''}}"
            >
            </textarea>

          </div>

          <div class="mt-5">
            <button type="submit" class="btn btn-primary">
              確認画面へ
            </button>
          </div>
        </fieldset>
      </form>
    </div>
  </div>
@endsection
