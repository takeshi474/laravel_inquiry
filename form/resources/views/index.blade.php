@extends('layouts.app')

@section('content')


<form method="POST" action="/upload" enctype="multipart/form-data">

  {{ csrf_field() }}

  <input type="file" id="file" name="file" class="form-control">
  <button type="submit">アップロード</button>

  <a href="/storage/upload_file.jpg">アップロードファイル</a>

</form>


@endsection
