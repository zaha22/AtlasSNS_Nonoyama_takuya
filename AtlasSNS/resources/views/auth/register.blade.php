@extends('layouts.logout')

@section('content')

<section>
  <div class="registerfile">
{!! Form::open(['url' => '/register']) !!}
  <h2>新規ユーザー登録</h2>

{{ Form::label('ユーザー名') }}
{{ Form::text('username',null,['class' => 'input']) }}

{{ Form::label('メールアドレス') }}
{{ Form::text('mail',null,['class' => 'input']) }}

{{ Form::label('パスワード') }}
{{ Form::text('password',null,['class' => 'input']) }}

{{ Form::label('パスワード確認') }}
{{ Form::text('password-confirm',null,['class' => 'input']) }}

{{ Form::submit('登録') }}

<p><a href="/login">ログイン画面へ戻る</a></p>

{!! Form::close() !!}
</div>
</section>
@endsection


<section>
  <div class="loginmain">
{!! Form::open(['url' => '/login']) !!}
    <h99>AtlasSNSへようこそ</h99>
    <p class="mail-adrres">{{ Form::label('mail-adrres') }}</p>
    <p>{{ Form::text('mail',null,['class' => 'input']) }}</p>
    <p class="password">{{ Form::label('password') }}</p>
    <p>{{ Form::password('password',['class' => 'input']) }}</p>

  <h3>{{ Form::submit('Login',['class' => 'btn btn-danger']) }}</h3>

<h6><a href="/register">新規ユーザーの方はこちら</a></h6>
{!! Form::close() !!}
  </div>
</section>
