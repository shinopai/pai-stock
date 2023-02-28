@extends('layouts.app') @section('title', '在庫追加') @section('content')
<div class="stocks">
  <div class="wrap">
    <h2 class="stocks__heading">在庫追加</h2>
    <form action="{{ route('stocks.add') }}" class="stocks-form" method="POST">
      @csrf
      <div class="stocks-form__item">
        <label for="name">材料名</label><br>
        <input type="text" name="name" id="name" class="stocks-form__text" value="{{ old('name') }}">
        @if($errors->has('name'))
        <p class="err-msg">{{ $errors->first('name') }}</p>
        @endif
      </div>
      <div class="stocks-form__item">
        <label for="amount">内容量</label><br>
        <input type="text" name="amount" id="amount" class="stocks-form__text" value="{{ old('amount') }}">
        @if($errors->has('amount'))
        <p class="err-msg">{{ $errors->first('amount') }}</p>
        @endif
      </div>
      <div class="stocks-form__item">
        <label for="unit_id">単位</label><br>
        <select name="unit_id" id="unit_id" class="stocks-form__select">
          @foreach (App\Models\Unit::all() as $unit)
          <option value="{{ $unit->id }}">
            {{ $unit->value }}
          </option>
          @endforeach
        </select>
      </div>
      <div class="stocks-form__item">
        <label for="quantity">個数</label><br>
        <input type="text" name="quantity" id="quantity" class="stocks-form__text" value="{{ old('quantity') }}">
        @if($errors->has('quantity'))
        <p class="err-msg">{{ $errors->first('quantity') }}</p>
        @endif
      </div>
      <div class="stocks-form__item">
        <input type="submit" value="追加" class="stocks-form__submit">
      </div>
    </form>
  </div>
</div>
@endsection
