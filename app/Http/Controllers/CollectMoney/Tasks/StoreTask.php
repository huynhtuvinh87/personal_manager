<?php

namespace App\Http\Controllers\CollectMoney\Tasks;

use App\Models\CollectMoney;
use Illuminate\Support\Facades\Auth;

class StoreTask
{
    /**
     * Handle get list task
     *
     * @param array $params object
     *
     * @return Response
     **/
    public function handle($request)
    {
        $date = explode('-', $request->date);
        $request->merge([
            'user_id' => Auth::user()->id,
            'year' => $date[0],
            'month' => $date[1],
            'day' => $date[2]
        ]);
        return CollectMoney::create($request->all());
    }
}
