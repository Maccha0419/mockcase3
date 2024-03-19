@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/purchase.css') }}">
@endsection

@section('content')
<div class="purchase__content">
    <div class="purchase__item">
        <div class="purchase__item-inner">
            <div class="purchase__item-img">
                @if ($item->img_url)
                <img src="{{ asset('storage/img/item/' . $item->img_url) }}" alt="商品名" class="item__image">
                @else
                <img src="{{ asset('storage/img/no-image.jpg' ) }}" alt="商品名" class="item__image">
                @endif
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
                <p class="confirmation__inner-item-value">{{$payment_method}}</p>
            </div>
        </div>
        @if ($payment_method === 'クレジットカード')
        <form action="/purchase" class="confirmation__content-submit" method="post">
        @csrf
            <script
                src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                data-key="{{ env('STRIPE_KEY') }}"
                data-amount="{{ json_encode($item->price) }}"
                data-name="お支払い画面"
                data-label="payment"
                data-description="現在はデモ画面です"
                data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                data-locale="auto"
                data-currency="JPY">
            </script>
            <input type="hidden" name="price" value="{{$item->price}}">
            <input name="item_id" type="hidden" value="{{ $item->id }}">
            <input name="payment_method" type="hidden" value="{{ $payment_method }}">
        </form>
        @else
        <form action="/purchase" class="confirmation__content-submit" method="post">
            @csrf
            <input name="payment_method" type="hidden" value="{{ $payment_method }}">
            <input name="item_id" type="hidden" value="{{ $item->id }}">
            <button class="confirmation__content-button">購入する</button>
        </form>
        @endif
    </div>
</div>
@endsection