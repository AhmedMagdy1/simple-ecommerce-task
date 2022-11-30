<?php


namespace App\Services\Tag;

use App\Models\Tag;

class LookupTagService
{
    function execute()
    {
        return Tag::all();
    }
}
