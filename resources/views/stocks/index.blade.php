@extends('layouts.app')

@section('title', '在庫一覧')

@section('content')
<div class="stocks">
  <div class="wrap">
    <h2 class="stocks__heading">在庫一覧</h2>
    @if (session('flash'))
    <p class="flash-msg">{{ session('flash') }}</p>
    @endif
    <a href="{{ route('stocks.create') }}" class="stocks__link">在庫追加</a>
    @if($stocks->isNotEmpty())
    <a href="{{ route('stocks.issue.index') }}" class="stocks__link">出庫管理</a>
    @endif
    <table class="stocks__table">
      <tbody>
        <tr>
          <th>材料名</th>
          <th>内容量</th>
          <th>単位</th>
          <th>数量</th>
          <th>入庫日</th>
          <th>編集</th>
        </tr>
        @forelse($stocks as $stock)
        <tr>
          <td>{{ $stock->name }}</td>
          <td>{{ $stock->amount }}</td>
          <td>{{ $stock->unit->value }}</td>
          <td>{{ $stock->quantity }}</td>
          <td>{{ Carbon\Carbon::parse($stock->arrival_date)->format('Y-m-d H:i') }}</td>
          <td class="edit">
            <a href="{{ route('stocks.edit', ['stock' => $stock->id]) }}" class="contents">編集</a>
          </td>
        </tr>
        @empty
        <tr>
          <td>商品はありません</td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
@endsection
