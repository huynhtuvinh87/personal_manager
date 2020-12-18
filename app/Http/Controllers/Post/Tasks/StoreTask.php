<?php

namespace App\Http\Controllers\Post\Tasks;

use App\Models\Post;
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
        $request->merge([
            'user_id' => Auth::user()->id
        ]);
        return Post::create($request->all());
    }
}
