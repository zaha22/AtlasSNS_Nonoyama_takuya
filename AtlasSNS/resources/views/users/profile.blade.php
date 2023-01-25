@extends('layouts.login')

@section('content')
<link rel="stylesheet">

<head>
  <form action="/profile/update" method="get">
<div class="update-kousin">
  <div class="id">
    <input type="hidden" value="{{ Auth::user()->id}}">
</div>
<div class="update-kousin">
  <div class="username">
    <h1>user name</h1>
    <input type="text"  name="username" value="{{ Auth::user()->username}}">
  </div>
  <div class="mailadress">
    <h2>mailadress</h2>
    <input type="text" name="mailadress" value="{{ Auth::user()->mail}}">
  </div>
  <div class="password">
    <h2>password</h2>
    <input type="password" name="password" value="{{ Auth::user()->password}}">
  </div>
  <div class="password-confirm">
    <h2>password confirm</h2>
    <input type="password" name="password confirm" value="{{ Auth::user()->password}}">
  </div>
  <div class="bio">
    <h2>bio</h2>
    <input type="text" name="bio" value="{{ Auth::user()->bio}}">
  </div>

  <form method="get" action="/profile" enctype="multipart/form-data" >
  <!-- <form action="/profile" method="get"> -->
  <div class="icon-update">
    <h2>icon image</h2>
    <img src="{{ asset('images/' . $userimage) }}" alt="">
    <a input type="text" name="iconimage">
     <button>ファイルを選択する</button>
  </div>
  </form>

<div class="update-buttom">
  <button>更新</button>
</div>
</form>
</div>
</div>

@endsection
