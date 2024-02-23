@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/purchase.css') }}">
@endsection

@section('content')
<div class="purchase__content">
    <div class="purchase__item">
        <div class="purchase__item-inner">
            <div class="purchase__item-img">
                <img src="{{$item->img_url}}" alt="商品画像">
            </div>
            <div class="purchase__item-description">
                <h2 class="purchase__item-name">{{$item->name}}</h2>
                <p class="purchase__item-price">¥{{$item->price}}</p>
            </div>
        </div>
        <div class="purchase__item-information">
            <h2 class="purchase__item-information-theme">お支払い方法</h2>
            <a href="{{ route('payment', $item->id) }}" class="purchase__item-information-link">変更する</a>
        </div>
        <div class="purchase__item-information">
            <h2 class="purchase__item-information-theme">配送先</h2>
            <a href="{{ route('address', $item->id) }}" class="purchase__item-information-link">変更する</a>
        </div>
    </div>
    <div class="confirmation__content">
        <div class="confirmation__inner">
            <div class="confirmation__inner-item">
                <p class="confirmation__inner-item-theme">商品代金</p>
                <p class="confirmation__inner-item-value">¥{{$item->price}}</p>
            </div>
            <div class="confirmation__inner-item">
                <p class="confirmation__inner-item-theme">お支払い金額</p>
                <p class="confirmation__inner-item-value">¥{{$item->price}}</p>
            </div>
            <div class="confirmation__inner-item">
                <p class="confirmation__inner-item-theme">お支払い方法</p>
                <p class="confirmation__inner-item-value">なし</p>
            </div>
        </div>
        <form action="/purchase" class="confirmation__content-submit" method="post">
            @csrf
            <input name="item_id" type="hidden" value="{{ $item->id }}">
            <button class="confirmation__content-button">購入する</button>
        </form>
    </div>
</div>

@endsection