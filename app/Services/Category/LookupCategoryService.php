<?php


namespace App\Services\Category;


use App\Models\Category;

class LookupCategoryService
{
    function execute()
    {
        $query = \request()->get('term');
        $resultCount = 10;
        $offset = (\request()->get('page') - 1) * $resultCount;
        $categories = Category::where('id', '!=', \request()->get('id') )->where('name', 'like', "$query%")->skip($offset)->take($resultCount)->get(['id', 'name as text']);
        $count = Category::where('id', '!=', \request()->get('id') )->count();
        $endCount = $offset + $resultCount;
        $morePages = $endCount < $count;
        $results = array(
            "results" => $categories,
            "pagination" => array( "more" => $morePages ),
        );
        return response()->json($results);
    }
}
