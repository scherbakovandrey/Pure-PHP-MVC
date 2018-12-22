<?php

namespace TaskBook\Views;

use TaskBook\App;
use TaskBook\Models;

abstract class AbstractView implements ViewInterface {
    /**
     * @var Models\ModelInterface
     */
    protected $model;

    protected $templatePath = '';

    protected $siteUrl = '';

    /**
     * @param Models\ModelInterface $model
     */
    public function __construct(Models\ModelInterface $model = null)
    {
        $config = App::config();

        $this->templatePath = $config['templatePath'];
        $this->siteUrl = $config['siteUrl'];

        $this->model = $model;
    }

    public function render()
    {
        return $this->getOutput($this->templatePath . 'main.php', $this->getContent());
    }

    protected function getContent() {
        return $this->getOutput($this->templatePath . $this->getTemplate());
    }

    private function getOutput($filename, $content = '') {
        ob_start();
        include $filename;
        return ob_get_clean();
    }

    abstract protected function getTemplate();
}