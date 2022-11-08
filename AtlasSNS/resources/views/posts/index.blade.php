@extends('layouts.login')

@section('content')

<div class="container">
        <h2 class="page-header">新しく投稿をする</h2>
        {!! Form::open(['url' => 'post/create']) !!}
        <div class="form-group">
            {!! Form::input('text', 'newPost', null, ['required', 'class' => 'form-control', 'placeholder' => '投稿内容']) !!}
        </div>
        <button type="submit" class="btn btn-success pull-right">追加</button>
        {!! Form::close() !!}


        <!--削除機能-->
        <h3 class="delete-header">削除機能</h3>
        {!! Form::open(['url' => 'post/{id}/delete']) !!}
        <div class="form-group">
            {!! Form::input('text', 'newPost', null, ['required', 'class' => 'form-control', 'placeholder' => '削除id']) !!}
        </div>
        <button type="submit" class="btn btn-success pull-right">削除</button>
        {!! Form::close() !!}


        <h4 class='page-header'>つぶやき内容の変更</h4>
        {!! Form::open(['url' => 'post/update']) !!}
        <div class="form-group">
            {!! Form::input('text', 'newPost', null, ['required', 'class' => 'form-control', 'placeholder' => '変更内容']) !!}
        </div>
        <button type="submit" class="btn btn-primary pull-right">更新</button>
        {!! Form::close() !!}

        <h5>ログインユーザーのつぶやき表示</h5>
        <tr>
            <th>投稿ユーザー</th>
            <p></p><th>つぶやき内容</th>
        </tr>

        <h2 class="page-header">投稿一覧</h2>
        <tr>
                <th>投稿No</th>
                <th>投稿内容</th>
                <th>投稿日時</th>
            </tr>
            @foreach ($post as $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->post }}</td>
                <td>{{ $post->created_at }}</td>
            </tr>
            @endforeach


</div>

@endsection
