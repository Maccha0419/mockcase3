@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/top.css') }}">
<script src="{{ mix('js/top.js') }}" defer></script>
@endsection

@section('content')
<div id="top">
    <top-component
    :items="{{ json_encode($items) }}"
    :user-id="{{ json_encode($user->id) }}"
    ></-component>
</div>
@endsection