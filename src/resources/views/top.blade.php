@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/top.css') }}">
<script src="{{ mix('js/top.js') }}" defer></script>
@endsection

@section('content')

@if (Auth::check())
<div id="top" class="component">
    <top-component
    :items="{{ json_encode($items) }}"
    :user-id="{{ json_encode($user->id) }}"
    :keyword="{{ json_encode($keyword) }}"
    ></top-component>
</div>
@endif
@if (!Auth::check())
<div id="top" class="component">
    <top-component
    :items="{{ json_encode($items) }}"
    :keyword="{{ json_encode($keyword) }}"
    ></top-component>
</div>
@endif

@endsection