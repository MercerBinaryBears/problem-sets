@extends('layouts.main')

@section('content')
<form method="POST" action="{{ url('/login') }}">
    {{ csrf_field() }}
    <label for="email">Email</label>
    <input id="email" name="email" />
    <br/>
    <label for="password">Password</label>
    <input id="password" name="password" type="password"/>
    <br/>
    <input type="submit" value="Login" />
</form>
@endsection
