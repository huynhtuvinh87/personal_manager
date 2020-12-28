<?php

namespace App\Http\Controllers\SpendingMoney;

use App\Http\Controllers\Controller;
use App\Http\Controllers\SpendingMoney\Tasks\ListTask;
use Illuminate\Http\Request;
use App\Models\SpendingMoney;
use App\Http\Controllers\SpendingMoney\Tasks\StoreTask;
use App\Http\Controllers\SpendingMoney\Tasks\UpdateTask;
use Session;

class SpendingMoneyController extends Controller
{
    public function index(Request $request)
    {
        $result = app(ListTask::class)->handle($request);
        return view('spending_money.index', ['result' => $result]);
    }

    public function create()
    {
        return view('spending_money.create', ['model' => new SpendingMoney()]);
    }

    public function store(Request $request)
    {
        app(StoreTask::class)->handle($request);
        Session::flash('success', 'Bạn tạo bài post thành công');
        return redirect()->route('spending_money.index');
    }

    public function edit($id)
    {
        return view('spending_money.update', ['model' => SpendingMoney::find($id)]);
    }

    public function update($id, Request $request)
    {
        app(UpdateTask::class)->handle($id, $request);
        Session::flash('success', 'Bạn tạo bài post thành công');
        return redirect()->route('spending_money.index');
    }

    public function destroy($id)
    {
        SpendingMoney::find($id)->delete();
        return redirect()->route('spending_money.index');
    }
}
