@extends('layouts.login')

@section('content')

<div class="users-search">
    <form action="/search" method="post">
    @csrf
    <div class="searchbutton">
        <input type="search" placeholder="ユーザー名" class="search" name="search" >
        <button type="submit">検索</button>
    </div>
        <p><li>検索ワード： {{ $keywordsearch }}</li></p>
    </form>
</div>



@foreach ($users as $user)
<div class="dateresult">
        <div class="searchicon-username">
            <img src="{{ asset('images/' . $user->images) }}">
            <hsearchusername>{{ $user->username }}</hsearchusername>
        </div>
@if(Auth()->user()->isfollowing($user->id))
        <div class="searchfollowbutton">
            <hsearchfollowbutton><a class="btn btn-danger"  href="users/{{$user->id}}/unfollow">フォロー解除</a></hsearchfollowbutton>
@else
            <hsearchfollowbutton></hsearchfollowbutton><a class="btn btn-info" href="users/{{$user->id}}/follow">フォローする</a>
        </div>
@endif
@endforeach
</div>
@endsection
