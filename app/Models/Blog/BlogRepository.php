<?php

namespace App\Models\Blog;

use App\Models\Blog\Blog;
use Illuminate\Support\Facades\DB;
use App\Log\LogCustom;
use App\Support\Facades\Input;
use App\Core\ReturnMessage;
use App\User;
use Auth;

class BlogRepository implements BlogRepositoryInterface
{
    public function get()
    {
        return Blog::all();
    }

    public function create($params)
    {

    }

    public function delete($params)
    {

    }
}