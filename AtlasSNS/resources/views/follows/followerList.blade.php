@extends('layouts.login')

@section('content')

<div class="followericon-list">
  <p>Follower list</p>
  <div class="followericongazou">
@foreach ($allfollowerusericon as $followericon)
    <a href="/otherprofile/{{$followericon->id}}"><img src="{{ asset('images/' . $followericon->images) }}" alt=""></a>
@endforeach
  </div>
</div>


@foreach ($followed_id as $followed)
<div class="follower-list">
  <div class="follower-list-post">
    <a href="/otherprofile/{{ $followed->user_id }}">
    <img src="{{ asset('images/' . $followed ->user->images) }}" alt=""></a>
      <hfollower-list-postusername>{{ $followed->user->username }}</hfollower-list-postusername>
      <hfollower-list-postcreated_at>{{ $followed->user->created_at }}</hfollower-list-postcreated_at>
      <p>{{ $followed->post }}</p>
  </div>
</div>

@endforeach


@endsection

