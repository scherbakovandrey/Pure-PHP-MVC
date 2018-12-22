<?php

namespace TaskBook\Views;

class ErrorView extends AbstractView {
    private $errorCode;

    public function __construct($errorCode)
    {
        parent::__construct(null);
        $this->errorCode = $errorCode;
    }

    protected function getTemplate() {
        return $this->errorCode . '.php';
    }
}