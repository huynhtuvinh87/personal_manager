<?php

namespace App\Http\Controllers\CollectMoney\Tasks;

use App\Models\CollectMoney;

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
        return CollectMoney::find($id)->update($request->all());
    }
}
