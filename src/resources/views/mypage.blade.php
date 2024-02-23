@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/mypage.css') }}">
<script src="{{ mix('js/mypage.js') }}" defer></script>
@endsection

@section('content')
<div class="mypage__content">
    <div class="mypage__upper">
        <div class="mypage__user">
            @if($user_img == null)
            <img src="{{ asset(storage/img/no-image.jpg ) }}">
            @else
            <img src="{{ asset('storage/img/profile/' . $user_img) }}" alt="プロフィール画像" class="mypage__user-img">
            <p class="mypage__user-name">{{ $user->name }}</p>
            @endif
        </div>
        <div class="edit">
            <form action="/mypage/profile" class="mypage__edit" method="get">
                <button class="edit__button">プロフィールを編集</button>
            </form>
        </div>
    </div>
    <div class="mypage__bottom" id="mypage">
        <mypage-component
        :user-id="{{ json_encode($user->id) }}"
        :my-items="{{ json_encode($my_items) }}"
        :sold-items="{{ json_encode($sold_items) }}"
        ></mypage-component>
    </div>
</div>
@endsection