<?php

namespace App\Http\Controllers\CollectMoney;

use App\Http\Controllers\Controller;
use App\Http\Controllers\CollectMoney\Tasks\ListTask;
use Illuminate\Http\Request;
use App\Models\CollectMoney;
use App\Http\Controllers\CollectMoney\Tasks\StoreTask;
use App\Http\Controllers\CollectMoney\Tasks\UpdateTask;
use Session;

class CollectMoneyController extends Controller
{
    public function index(Request $request)
    {
        $result = app(ListTask::class)->handle($request);
        return view('collect_money.index', ['result' => $result]);
    }

    public function create()
    {
        return view('collect_money.create', ['model' => new CollectMoney()]);
    }

    public function store(Request $request)
    {
        app(StoreTask::class)->handle($request);
        Session::flash('success', 'Bạn tạo bài post thành công');
        return redirect()->route('collect_money.index');
    }

    public function edit($id)
    {
        return view('collect_money.update', ['model' => CollectMoney::find($id)]);
    }

    public function update($id, Request $request)
    {
        app(UpdateTask::class)->handle($id, $request);
        Session::flash('success', 'Bạn tạo bài post thành công');
        return redirect()->route('collect_money.index');
    }

    public function destroy($id)
    {
        Post::find($id)->delete();
        return redirect()->route('collect_money.index');
    }
}
