<?php

namespace App\Models\Blog;

use App\Models\Blog\Blog;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
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

    public function getById($id)
    {
        Log::info('Getting the user profile for user: {id}', ['id' => $id]);
        return Blog::find($id);
    }

    public function update($params, $id)
    {
        $currentUser = auth()->user()->id;
        try {
            $blog = $this->getById($id);
            $blog->update($params);
            Log::info('Updated the blog for blog: {id}', ['id' => $id]);
        } catch(\Exception $e){            
            //create error log
            $date    = date("Y-m-d H:i:s");
            $message = '['. $date .'] '. 'error: ' . 'User '.$currentUser.' updated blog info by invoice id  = '. $id .' and got error -------'.$e->getMessage(). ' ----- line ' .$e->getLine(). ' ----- ' .$e->getFile(). PHP_EOL;
            Log::create($date, $message);
        }
        
    }

    public function create($params)
    {

    }

    public function delete($params)
    {

    }
}