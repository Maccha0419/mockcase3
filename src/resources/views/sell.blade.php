@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/sell.css') }}">
<script src="{{ mix('js/sell.js') }}" defer></script>
@endsection

@section('content')
<div class="sell__content">
    <div class="sell-form__heading">
        <h2>商品の出品</h2>
    </div>
    <div class="sell-form__inner" id="sell">
        <sell-component
        :old="{{ json_encode(Session::getOldInput()) }}"
        :errors= "{{ $errors }}"
        ></sell-component>
    </div>
</div>
@endsection