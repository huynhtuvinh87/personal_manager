<?php

namespace App\Http\Controllers\Post\Tasks;

use App\Models\Post;

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
        return Post::find($id)->update($request->all());
    }
}
