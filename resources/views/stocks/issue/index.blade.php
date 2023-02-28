@extends('layouts.app')

@section('title', '出庫管理')

@section('content')
<div class="stocks">
  <div class="wrap">
    <h2 class="stocks__heading">出庫</h2>
    @if (session('flash'))
    <p class="flash-msg">{{ session('flash') }}</p>
    @endif
    <div class="stocks-issue">
      @foreach ($stocks as $stock)
      <form action="{{ route('stocks.issue', ['stock' => $stock->id]) }}" method="POST" class="stocks-issue-form">
        @csrf
        <p class="stocks-issue-form__data">
          {{ $stock->name }}({{ $stock->amount }}{{ $stock->unit->value }})
        </p>
        <p class="stocks-issue-form__data">在庫:{{ $stock->quantity }}</p>
        <label for="quantity">数量</label><br>
        <input type="number" name="quantity" id="quantity" value="0" min="1" max="{{ $stock->quantity }}" class="stocks-issue-form__text"><br>
        <p id="errMsg{{ $loop->index }}" class="err-msg"></p>
        <input type="submit" value="出庫" class="stocks-issue-form__submit" disabled>
      </form>
      @endforeach
    </div>
  </div>
</div>

<script>
  'use strict';

  let errorFlag = false;
  let inputText = document.getElementsByClassName('stocks-issue-form__text');

  for(let i = 0; i < inputText.length; i ++){
    inputText[i].addEventListener('change', function(){
      if(this.value == '' || this.value > this.getAttribute("max")){
        errorFlag = true;
      }
      if(errorFlag){
        document.getElementById('errMsg' + i).textContent = '数量は正しい値をいれてください';
      }else{
        document.getElementById('errMsg' + i).nextElementSibling.disabled = false;
        document.getElementById('errMsg' + i).textContent = '';
      }
    })
  }
</script>
@endsection
