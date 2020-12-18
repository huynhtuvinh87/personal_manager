<?php

namespace App\Http\Controllers\Post\Actions;

use Request;
use App\Http\Controllers\Post\Tasks\ListTask;

class ListAction
{
    /**
     * Get params in request and send to task
     *
     * @param Request $request
     *
     * @return mixed
     */
    public function handle($request)
    {
        return app(ListTask::class)->handle($request);
    }
}
