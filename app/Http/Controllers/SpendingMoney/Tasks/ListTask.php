<?php

namespace App\Http\Controllers\SpendingMoney\Tasks;

use App\Models\SpendingMoney;
use Carbon\Carbon;

class ListTask
{
    /**
     * Get list city_name belong prefecture_code
     *
     * @param $prefectureCode prefecture_code
     *
     * @return mixed
     */
    public function handle($request)
    {
        $query = SpendingMoney::select(
            'spending_moneys.id',
            'spending_moneys.title',
            'spending_moneys.date',
            'spending_moneys.price',
        )
            ->join('users', 'users.id', 'spending_moneys.user_id')
            ->where(function ($query) use ($request) {
                if ($request->month && $request->year) {
                    $query->where('month', $request->month);
                }
                if ($request->month && !$request->year) {
                    $query->where('month', $request->month)->where('year', Carbon::now()->year);
                }
                if ($request->year) {
                    $query->where('year', $request->year);
                }
                if (!$request->month && !$request->year) {
                    $query->where('month', Carbon::now()->month)->where('year', Carbon::now()->year);
                }
            });
        return ['data' => $query->get(), 'sum_price' => $query->sum('price')];
    }
}
