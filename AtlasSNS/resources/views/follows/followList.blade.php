@extends('layouts.login')

@section('content')

<div class="followicon-list">
  <p>Follow list</p>
  <div class="followicongazou">
@foreach ($allfollowusericon as $followicon)
    <a href="/otherprofile/{{$followicon->id}}"><img src="{{ asset('images/' . $followicon->images) }}" alt=""></a>
@endforeach
  </div>
</div>


@foreach ($follow_post as $followlist)
<div class="follow-list">
  <div class="follow-list-post">
    <a href="/otherprofile/{{ $followlist->user_id }}"><img src="{{ asset('images/' . $followlist ->user->images) }}" alt=""></a>
      <hfollow-list-postusername>{{ $followlist ->user->username}}</hfollow-list-postusername>
      <hfollow-list-postcreated_at>{{ $followlist ->user->created_at}}</hfollow-list-postcreated_at>
      <p>{{ $followlist->post}}</p>
  </div>
</div>

@endforeach

@endsection
