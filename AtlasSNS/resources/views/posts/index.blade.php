@extends('layouts.login')

@section('content')

<li class="indexpostmain">
        <div class="indexpostcreate">
            <img src="{{ asset('images/' . Auth::user()->images) }}">
            {!! Form::open(['url' => 'post/create']) !!}
            {!! Form::input('text', 'newPost', null, ['required', 'class' => 'form-control', 'placeholder' => '投稿内容を入力してください']) !!}
            <input type="image" src="/images/post.png" id="iconbutton1"   width="100" height="100">
        </div>
</li>
{!! Form::close() !!}


@foreach ($post as $post)
<div class="indexpostlist">
    <ul>
        <li class="post-block">
            <figure><img src="{{ asset('images/' . $post->user->images) }}"></figure>
            <div class="post-content">
                    {{ $post->user->username}}
                    <p>{{ $post->created_at }}</p>


                    {{ $post->post }}

            </div>
            <div class="indexdeletebutton">
                <a href="post/{{$post->id}}/delete"><img src="/images/trash-h.png" width="60" height="60"></a>
                <a class="js-modal-open" href="" post="{{ $post->post }}" post_id="{{ $post->id }}"><img
                src="/images/edit.png" width="60" height="60"></a>
            </div>
        </li>
    </ul>
</div>
@endforeach


            <!-- モーダルの中身 -->
            <div class="modal js-modal">
                <div class="modal__bg js-modal-close"></div>
                <div class="modal__content">
                    <form action="post/{id}/update" method="get">
                        <textarea name="post" class="modal_post"></textarea>
                        <input type="hidden" name="id" class="modal_id" value="">
                        <input type="submit" value="更新">
                        {{ csrf_field() }}
                    </form>
                    <a class="js-modal-close" href="">閉じる</a>
                </div>
            </div>


@endsection
