<?php

namespace App\Models\Blog;

interface BlogRepositoryInterface
{
    public function get();
    public function getById($id);

    public function update($parms, $id);

    public function create($params);

    public function delete($params);
}