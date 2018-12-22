<?php

namespace TaskBook\Models;

use TaskBook\App;
use TaskBook\Utils\TextFormatter;

class TaskModel extends AbstractBaseModel
{
    protected function getDefaultSortColumn()
    {
        return 'created';
    }

    //get possible sorting columns
    protected function getSortColumns()
    {
        return [
            'created',
            'username',
            'email',
            'status',
        ];
    }

    public function all()
    {
        $this->setOrderAndLimit();

        $tasks = \Tasks::find('all', $this->cond);

        return $this->format($tasks);
    }

    public function count()
    {
        return \Tasks::count();
    }

    public function get($id)
    {
        $task = \Tasks::find($id);
        $this->attributes = $this->mapAttributes($task);
    }

    protected function mapAttributes($item)
    {
        return [
            'id' => $item->id,
            'username' => $item->username,
            'email' => $item->email,
            'text' => $item->text,
            'status' => $item->status,
            'statusText' => $item->status ? 'Implemented' : 'Pending'
        ];
    }

    public function update(array $attributes)
    {
        if (App::isLogged()) {
            $attributes['status'] = $attributes['status'] == 'on' ? 1 : 0;
        } else {
            unset($attributes['status']);
        }

        $this->attributes = $attributes;

        $task = \Tasks::find($attributes['id']);
        $task->update_attributes($this->attributes);
        return $task->is_valid();
    }

    public function add(array $attributes)
    {
        $this->attributes = $attributes;

        if (!$this->isProperlyFormated($attributes['text']))
        {
            return false;
        }

        $task = new \Tasks($attributes);
        $task->save();
        return $task->is_valid();
    }

    public function isProperlyFormated($text)
    {
        return TextFormatter::checkFormat($text);
    }
}