@extends('layouts.logout')

@section('content')

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
@endsection
