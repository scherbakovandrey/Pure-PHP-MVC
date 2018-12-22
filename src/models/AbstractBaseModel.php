<?php

namespace TaskBook\Models;

abstract class AbstractBaseModel extends AbstractModel implements DataTableInterface
{
    const ITEMS_PER_PAGE = 3;

    protected $page = 1;

    protected $sortColumn = SortableInterface::DATE;

    protected $sortOrder = 'DESC';

    protected $startIndex = 1;

    protected $itemsPerPage;

    protected $cond = [];

    public function setItemsPerPage($itemsPerPage)
    {
        $this->itemsPerPage = $itemsPerPage;
    }

    public function getSortLink($sortColumn)
    {
        return '1/' . $sortColumn . '/' . $this->getNextSortOrder();
    }

    public function getPage()
    {
        return $this->page;
    }

    public function setPage($page)
    {
        $this->page = $page;
        return $this;
    }

    public function setSortColumn($sortColumn)
    {
        $this->sortColumn = $sortColumn;
        return $this;
    }

    public function setSortOrder($sortOrder)
    {
        $this->sortOrder = strtoupper($sortOrder);
        return $this;
    }

    public function getSortColumn()
    {
        return $this->sortColumn;
    }

    public function getSortOrder()
    {
        return strtolower($this->sortOrder);
    }

    public function getNextSortOrder()
    {
        return strtolower($this->sortOrder == SortableInterface::ASC ? SortableInterface::DESC : SortableInterface::ASC);
    }

    protected function setOrderAndLimit()
    {
        $itemsPerPage = $this->itemsPerPage ? $this->itemsPerPage : self::ITEMS_PER_PAGE;

        if (!empty($this->sortColumn) && !empty($this->sortOrder) && (in_array($this->sortColumn, $this->getSortColumns()) && in_array($this->sortOrder, ['ASC', 'DESC']))) {
                $this->cond['order'] = $this->sortColumn . ' ' . $this->sortOrder;
        } else {
            $this->cond['order'] = $this->getDefaultSortColumn() . ' DESC';
        }

        $this->cond['order'] .= ', id DESC';

        if (!empty($this->page)) {
            $this->cond['offset'] = ($this->page - 1) * $itemsPerPage;
            $this->startIndex = $this->cond['offset'] + 1;
        } else {
            $this->startIndex = 1;
        }
        $this->cond['limit'] = $itemsPerPage;
    }

    abstract protected function getDefaultSortColumn();

    abstract protected function getSortColumns();
}