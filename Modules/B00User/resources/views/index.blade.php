@extends('b00user::layouts.master')

@section('content')
    <h1>Hello World</h1>

    <p>Module: {!! config('b00user.name') !!}</p>
@endsection
