@extends('layout')



@section('contents')




@if ($errors->any())

<div>
    @foreach ($errors->all() as $error)
        {{ $error }}
    @endforeach
</div>
@endif



    <h1>ログイン</h1>

    @if (session('user_success') == true)
    登録されました！！<br>
    @endif

    <form action="/login" method="post">
        @csrf
        email：<input name="email" value="{{ old('email') }}"><br>
        パスワード：<input type="password" name="password"><br>
        <button>ログインする</button>
    </form>
    <a href="/user/register">会員登録</a>
@endsection