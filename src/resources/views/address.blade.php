@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/address.css') }}">
@endsection

@section('content')
<div class="address__content">
    <div class="address-form__heading">
        <h2>住所の変更</h2>
    </div>
    <form class="form" action="{{ route('update_address', $item_id) }}" method="post">
        @csrf
        <div class="form__group">
            <div class="form__group-content">
                <div class="form__input--text">
                    <label for="postcode">郵便番号</label>
                    <input type="postcode" name="postcode" id="postcode" value="{{ old('postcode') }}" />
                </div>
                <div class="form__error">
                @error('postcode')
                {{ $message }}
                @enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-content">
                <div class="form__input--text">
                    <label for="address">住所</label>
                    <input type="address" name="address" id="address" value="{{ old('address') }}" />
                </div>
                <div class="form__error">
                @error('address')
                {{ $message }}
                @enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-content">
                <div class="form__input--text">
                    <label for="building">建物名</label>
                    <input type="building" name="building" id="building" value="{{ old('building') }}" />
                </div>
                <div class="form__error">
                @error('building')
                {{ $message }}
                @enderror
                </div>
            </div>
        </div>
        <div class="form__button">
            <button class="form__button-submit" type="submit">更新する</button>
        </div>
    </form>
</div>
@endsection