<?php

namespace TaskBook\Controllers;

use TaskBook\App;
use TaskBook\Models\TaskModel;
use TaskBook\Models\SortableInterface;
use TaskBook\Utils\FlashMessages;
use TaskBook\Views\TaskView;
use TaskBook\Views\TaskAdd;
use TaskBook\Views\TaskEdit;

class TaskController
{
    public function anyIndex()
    {
        $taskModel = new TaskModel();
        return (new TaskView($taskModel))->render();
    }

    public function getList($page = 1, $sortColumn = SortableInterface::DATE, $sortOrder = SortableInterface::DESC)
    {
        if (!is_numeric($page)) {
            return App::renderNotFound();
        }

        $taskModel = (new TaskModel())
            ->setPage($page)
            ->setSortColumn($sortColumn)
            ->setSortOrder($sortOrder);
        return (new TaskView($taskModel))->render();
    }

    public function getAdd()
    {
        $taskModel = new TaskModel();
        return (new TaskAdd($taskModel))->render();
    }

    public function postAdd()
    {
        $taskModel = new TaskModel();

        if ($taskModel->add($_POST)) {
            App::flash(FlashMessages::SUCCESS, 'New task successfully added!');
            App::redirect('list');
        }

        //if we disable javascript we still will be able to show error messages
        App::flash(FlashMessages::ERROR, 'Please check fields!');
        return (new TaskAdd($taskModel))->render();
    }

    public function getEdit($id)
    {
        App::guard();

        $taskModel = new TaskModel();
        $taskModel->get($id);

        return (new TaskEdit($taskModel))->render();
    }

    public function postEdit()
    {
        App::guard();

        $taskModel = new TaskModel();
        $taskModel->get($_POST['id']);

        if ($taskModel->update($_POST)) {
            App::flash(FlashMessages::SUCCESS, 'Task successfully updated!');
            App::redirect('list');
        }

        //if we disable javascript we still will be able to show error messages
        App::flash(FlashMessages::ERROR, 'Please check fields!');
        return (new TaskEdit($taskModel))->render();
    }
}