<?php

namespace TaskBook\Views;

use TaskBook\Utils\Paginator;

use TaskBook\Models;
use TaskBook\Models\TaskModel;

class TaskView extends AbstractView {
    private $paginator;

    public function __construct(Models\DataTableInterface $model)
    {
        parent::__construct($model);

        $urlPattern = $this->siteUrl . 'list/(:num)/' . $model->getSortColumn() . '/' . $model->getSortOrder();

        $this->paginator = new Paginator(
            $model->count(),
            TaskModel::ITEMS_PER_PAGE,
            $model->getPage(),
            $urlPattern
        );
    }

    public function getPagination() {
        return $this->paginator;
    }

    protected function getTemplate() {
        return 'tasks/list.php';
    }
}