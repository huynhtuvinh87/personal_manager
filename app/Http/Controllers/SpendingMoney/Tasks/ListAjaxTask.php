<?php

namespace App\Http\Controllers\Post\Tasks;

use App\Models\Post;
use DB;

class ListAjaxTask
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
        $data = Product::select(
            'products.id',
            'products.title',
            'products.price',
            DB::raw('group_concat(concat_ws(",", categories.id, categories.title) separator ";") as categories')
        )->leftJoin('categories', function ($join) {
            $join->whereRaw('JSON_SEARCH(products.category_ids, "all", categories.id) IS NOT NULL');
        })->where(function ($query) use ($request) {
            if ($request->search) {
                $query->where('products.title', 'LIKE', '%' . $request->search . '%');
            }
            if ($request->category_id) {
                $categories = '{"0":"' . $request->category_id . '"}';
                $query->whereRaw('JSON_SEARCH(?, "all", categories.id) IS NOT NULL', [$categories]);
            }
        })->groupBy('products.id')
            ->paginate(20)->toArray();
        return $data;
    }
}
