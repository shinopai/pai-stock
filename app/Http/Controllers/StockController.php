<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Requests\StockRequest;
use App\Models\Stock;
use App\Models\Unit;

class StockController extends Controller
{
    public function index()
    {
        $stocks = Stock::latest()->get();

        return view('stocks.index', compact('stocks'));
    }

    public function create()
    {
        return view('stocks.create');
    }

    public function add(StockRequest $request)
    {
        $unit = Unit::find($request->unit_id);
        $unit->stocks()->create([
            'name' => $request->name,
            'amount' => $request->amount,
            'quantity' => $request->quantity,
            'arrival_date' => Carbon::now()
        ]);

        return redirect('/')->with('flash', '商品を追加しました');
    }

    public function edit(Stock $stock)
    {
        return view('stocks.edit', compact('stock'));
    }

    public function update(StockRequest $request, Stock $stock)
    {
        $old_stock_name = $stock->name;

        $stock->name = $request->name;
        $stock->amount = $request->amount;
        $stock->unit_id = $request->unit_id;
        $stock->quantity = $request->quantity;
        $stock->update();

        return redirect('/')->with('flash', '「'.$old_stock_name.'」を更新しました');
    }

    public function issueIndex()
    {
        $stocks = Stock::latest()->get();

        return view('stocks.issue.index', compact('stocks'));
    }

    public function issue(Request $request, Stock $stock)
    {
        $stock->quantity = $stock->quantity - (int)$request->quantity;
        $stock->update();

        return redirect()->back()->with('flash', '出庫作業が完了しました');
    }
}
