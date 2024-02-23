@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/item.css') }}">
<script src="{{ mix('js/like.js') }}" defer></script>
<script src="{{ mix('js/comment.js') }}" defer></script>
@endsection

@section('content')
<div class="item__content">
    <div class="item__content-image">
        <img src="{{ $item->img_url }}" alt="商品名" class="item__image">
    </div>
    <div class="item__content-detail">
        <h1 class="item__name">{{ $item->name }}</h1>
        <p class="item__brand">{{ $item->brand }}</p>
        <p class="item__price">¥{{ number_format($item->price) }}(値段)</p>
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
                :user-id="{{ json_encode($user->id) }}"
                :item-id="{{ json_encode($item->id) }}"
                :comment-number="{{ json_encode($comment_number) }}"
            ></comment-component>
        </div>
        <div class="item__purchase">
            <form action="{{ route('confirm', $item->id) }}" class="item__purchase-form" method="get">
                <button class="item__purchase-button">購入する</button>
            </form>
        </div>
        <h2 class="item__description">商品説明</h2>
        <div class="item__description-inner">{{ $item->description }}</div>
        <h2 class="item__information">商品の情報</h2>
        <div class="item__category">
            <p class="item__category-theme">カテゴリー</p>
            @foreach ($categories as $category)
            <p class="item__category-inner">{{ $category->name }}</p>
            @endforeach
        </div>
        <div class="item__condition">
            <p class="item__condition-theme">商品の状態</p>
            <p class="item__condition-inner">{{ $item->condition->condition }}</p>
        </div>
    </div>
</div>

@endsection