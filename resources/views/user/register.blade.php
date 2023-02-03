@extends('layout')



@section('title')（会員登録）@endsection



@section('contents')

    <h1>ユーザー登録</h1>

    @if ($errors->any())
    <div>
        @foreach ($errors->all() as $error)
        {{ $error }}<br>
        @endforeach
    </div>
    @endif

    <form action="/user/register" method="post">
        @csrf
        名前：<input name="name" value="{{ old('name') }}"><br>
        email：<input name="email" value="{{ old('email') }}"><br>
        パスワード：<input type="password" name="password"><br>
        パスワード確認：<input type="password" name="password_check"><br>
        <button>登録する</button>
    </form>

@endsection