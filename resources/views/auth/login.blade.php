@extends('layouts.main')

@section('content')
<form method="POST" action="{{ url('/login') }}">
    {{ csrf_field() }}
    <label for="username">Username</label>
    <input id="username" name="username" />
    <br/>
    <label for="password">Password</label>
    <input id="password" name="password" type="password"/>
    <br/>
    <input type="submit" value="Login" />
</form>
@endsection
