<?php

namespace App\Http\Controllers\Dashboard\Tasks;

use App\Models\CollectMoney;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class CollectMoneyTask
{
    /**
     * Get list city_name belong prefecture_code
     *
     * @param $prefectureCode prefecture_code
     *
     * @return mixed
     */
    public function handle()
    {
        return ["weekday" => $this->weekday(), "month" => $this->month(), 'year' => $this->year()];
    }

    public function weekday()
    {
        $first_day_of_week = date("Y-m-d", strtotime('monday this week'));
        $last_day_of_week = date("Y-m-d", strtotime('sunday this week'));
        $first_day_of_week_prev = date("Y-m-d", strtotime("-7 day", strtotime($first_day_of_week)));
        $current_week = CollectMoney::where('user_id', Auth::user()->id)
            ->where('date', '>=', $first_day_of_week)
            ->where('date', '<=', $last_day_of_week)
            ->sum("price");
        $last_week = CollectMoney::where('user_id', Auth::user()->id)
            ->where('date', '>=', $first_day_of_week_prev)
            ->where('date', '<=', $last_day_of_week)
            ->sum("price");
        return ['current_week' => $current_week, 'last_week' => $last_week];
    }

    public function month()
    {
        $first_month = date("Y-m-d", mktime(0, 0, 0, date("m"), 1));
        $last_month = date("Y-m-d", mktime(0, 0, 0, date("m")));
        $first_month_prev = date("Y-m-d", mktime(0, 0, 0, date("m") - 1, 1));
        $last_month_prev = date("Y-m-d", mktime(0, 0, 0, date("m"), 0));
        $current_month = CollectMoney::where('user_id', Auth::user()->id)
            ->where('date', '>=', $first_month)
            ->where('date', '<=', $last_month)
            ->sum("price");
        $last_month = CollectMoney::where('user_id', Auth::user()->id)
            ->where('date', '>=', $first_month_prev)
            ->where('date', '<=', $last_month_prev)
            ->sum("price");
        return ['current_month' => $current_month, 'last_month' => $last_month];
    }

    public function year()
    {
        $first_year = date('Y-m-d', strtotime(date('Y-01-01')));
        $last_year = date('Y-m-d', strtotime(date('Y-12-31')));
        $first_year_prev = date('Y-m-d', strtotime('-1 year', strtotime(date('Y-01-01'))));
        $last_year_prev = date('Y-m-d', strtotime('-1 year', strtotime(date('Y-12-31'))));
        $current_year = CollectMoney::where('user_id', Auth::user()->id)
            ->where('date', '>=', $first_year)
            ->where('date', '<=', $last_year)
            ->sum("price");
        $last_year = CollectMoney::where('user_id', Auth::user()->id)
            ->where('date', '>=', $first_year_prev)
            ->where('date', '<=', $last_year_prev)
            ->sum("price");
        return ['current_year' => $current_year, 'last_year' => $last_year];
    }
}
