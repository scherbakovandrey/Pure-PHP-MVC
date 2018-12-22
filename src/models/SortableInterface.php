<?php

namespace TaskBook\Models;

interface SortableInterface
{
    const DATE = 'created';

    const ASC = 'ASC';

    const DESC = 'DESC';

    public function setSortColumn($sortColumn);

    public function setSortOrder($sortOrder);

    public function getSortColumn();

    public function getSortOrder();
}