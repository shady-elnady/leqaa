@extends('g00notification::layouts.master')

@section('content')
    <h1>Hello World</h1>

    <p>Module: {!! config('g00notification.name') !!}</p>
@endsection
