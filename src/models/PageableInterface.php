<?php

namespace TaskBook\Models;

interface PageableInterface
{
    public function getPage();

    public function setPage($page);
}