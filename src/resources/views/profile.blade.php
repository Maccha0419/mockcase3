@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/profile.css') }}">
<script src="{{ mix('js/profile.js') }}" defer></script>
@endsection

@section('content')
<div class="profile__content">
    <div class="profile-form__heading">
        <h2>プロフィールの設定</h2>
    </div>
    <div class="profile-form__inner" id="profile">
        <profile-component
        :old="{{ json_encode(Session::getOldInput()) }}"
        :errors= "{{ $errors }}"
        ></profile-component>
    </div>
</div>
@endsection