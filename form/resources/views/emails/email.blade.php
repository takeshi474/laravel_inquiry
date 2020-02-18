
  <div class="row">
    <h1>お問い合わせ内容を受け付けました。</h1>
  </div>

<br>
・お名前<br>
{{ $contact['name'] }}様<br>
<br>
・メールアドレス<br>
{{ $contact['email'] }}<br>
<br>
・お問い合わせ内容<br>
{!! nl2br(e($contact['post'])) !!}<br>

  <div class="row">
    <p>お問い合わせありがとうございました。</p>
  </div>
