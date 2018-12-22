<?php

namespace TaskBook\Models;

interface DatabaseModelInterface
{
    public function all();

    public function count();

    public function get($id);

    public function add(array $attributes);

    public function update(array $attributes);
}