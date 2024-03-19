@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/item.css') }}">
<link rel="stylesheet" href="{{ asset('css/like.css') }}">
<link rel="stylesheet" href="{{ asset('css/comment.css') }}">
<script src="{{ mix('js/like.js') }}" defer></script>
<script src="{{ mix('js/comment.js') }}" defer></script>
<link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
@endsection

@section('content')
<div class="item__content">
    <div class="item__content-image">
        @if ($item->img_url)
        <img src="{{ asset('storage/img/item/' . $item->img_url) }}" alt="商品名" class="item__image">
        @else
        <img src="{{ asset('storage/img/no-image.jpg' ) }}" alt="商品名" class="item__image">
        @endif
    </div>
    <div class="item__content-detail">
        <div class="item__content-detail__inner">
            <h1 class="item__name">{{ $item->name }}</h1>
            <p class="item__brand">{{ $item->brand }}</p>
            <p class="item__price">¥{{ number_format($item->price) }}(値段)</p>
            <div class="evaluate">
                @if (Auth::check())
                <div class="like" id="like" >
                    <like-component
                        :user-id="{{ json_encode($user->id) }}"
                        :item-id="{{ json_encode($item->id) }}"
                        :default-Liked="{{ json_encode($defaultLiked) }}"
                        :like-number="{{ json_encode($like_number) }}"
                    ></like-component>
                </div>
                <div class="comment" id="comment" >
                    <comment-component
                        :old="{{ json_encode(Session::getOldInput()) }}"
                        :errors= "{{ $errors }}"
                        :user-id="{{ json_encode($user->id) }}"
                        :item-id="{{ json_encode($item->id) }}"
                        :comment-number="{{ json_encode($comment_number) }}"
                        :comments="{{ json_encode($comments) }}"
                    ></comment-component>
                </div>
                @endif
                @if (!Auth::check())
                <div class="like" id="like" >
                    <like-component
                        :item-id="{{ json_encode($item->id) }}"
                        :default-Liked="{{ json_encode($defaultLiked) }}"
                        :like-number="{{ json_encode($like_number) }}"
                    ></like-component>
                </div>
                <div class="comment" id="comment" >
                    <comment-component
                        :old="{{ json_encode(Session::getOldInput()) }}"
                        :errors= "{{ $errors }}"
                        :item-id="{{ json_encode($item->id) }}"
                        :comment-number="{{ json_encode($comment_number) }}"
                        :comments="{{ json_encode($comments) }}"
                    ></comment-component>
                </div>
                @endif
            </div>
            <div class="item__purchase">
                <form action="{{ route('confirm', $item->id) }}" class="item__purchase-form" method="get">
                    <button class="item__purchase-button">購入する</button>
                </form>
            </div>
            <h2 class="item__description">商品説明</h2>
            <div class="item__description-inner">{!! nl2br(e($item->description)) !!}</div>
            <h2 class="item__information">商品の情報</h2>
            <div class="item__category">
                <div class="item__category-thema">
                    <h4>カテゴリー</h4>
                </div>
                <div class="item__category-inner">
                    @foreach ($categories as $category)
                    <div class="item__category-text">
                        <p>{{ $category->name }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="item__condition">
                <div class="item__condition-theme">
                    <h4>商品の状態</h4>
                </div>
                <div class="item__condition-inner">
                    <p>{{ $item->condition->condition }}</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection