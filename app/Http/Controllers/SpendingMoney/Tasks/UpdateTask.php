<?php

namespace App\Http\Controllers\Post\Tasks;

use App\Models\SpendingMoney;

class UpdateTask
{
    /**
     * Handle get list task
     *
     * @param array $params object
     *
     * @return Response
     **/
    public function handle($id, $request)
    {
        $date = explode('-', $request->date);
        $request->merge([
            'year' => $date[0],
            'month' => $date[1],
            'day' => $date[2]
        ]);
        return SpendingMoney::find($id)->update($request->all());
    }
}
