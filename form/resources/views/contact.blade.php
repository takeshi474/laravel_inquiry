@extends('layouts.app')

@section('content')

  <div class="container mt-4">
    <div class="border p-4">
      <h1>お問い合わせ</h1>

      <form method="POST" action="{{ route('confirm') }}">
        @csrf
        <fieldset class="mb-4">

          <!-- 名前 -->
          <div class="form-row col-md-2">
            <label for="name">
              お名前
            </label>
            <input
              id="name"
              type="text"
              name="name"
              value="{{ old('name') }}"
              class="form-control"
            >
            @if ($errors -> has('name'))
              <p class="error-message">
                {{ $errors -> first('name') }}
              </p>
            @endif
          </div>

          <!-- メール -->
          <div class="form-row col-md-2">
            <label for="email">
              メールアドレス
            </label>
            <input
              id="email"
              type="text"
              name="email"
              value="{{ old('email') }}"
              class="form-control"
            >
              @if ($errors -> has('email'))
                <p class="error-message">
                  {{ $errors -> first('email') }}
                </p>
              @endif
          </div>

          <!-- お問い合わせ内容 -->
          <div class="form-row col-md-2">
            <label for="post">
              お問い合わせ内容
            </label>
              <textarea
                id="post"
                name="post"
                cols="40"
                rows="7"
                value="{{!! nl2br(e('post')) !!}}"
                class="form-control"
              >
              {{ old('post') }}
              </textarea>
              @if ($errors -> has('post'))
                <p class="error-message">{{ $errors -> first('post') }}</p>
              @endif
          </div>

          <!-- 確認ボタン -->
          <div class="mt-5">
            <button type="submit" class="btn btn-primary">
              入力内容確認
            </button>
          </div>

        </fieldset>
      </form>
    </div>
  </div>
@endsection
