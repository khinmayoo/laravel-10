<?php

namespace App\Models\Blog;

interface BlogRepositoryInterface
{
    public function get();

    public function create($params);

    public function delete($params);
}