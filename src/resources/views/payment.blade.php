@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/payment.css') }}">
@endsection

@section('content')
<div class="payment__content">
    <form action="{{ route('confirm', $item_id) }}" class="form" method="get">
        @csrf
        <div class="item">
            <input type="radio" name="payment_method" class="" id="convenience" value="コンビニ支払い" checked>
            <label for="convenience" class="form-check-label">コンビニ支払い</label>
        </div>
        <div class="item">
            <input type="radio" name="payment_method" class="" id="bank" value="銀行振込">
            <label for="bank" class="form-check-label">銀行振込</label>
        </div>
        <div class="item">
            <input type="radio" name="payment_method" class="" id="credit" value="クレジットカード">
            <label for="credit" class="form-check-label">クレジットカード</label>
        </div>
        <button class="button">決定する</button>
    </form>
</div>
@endsection