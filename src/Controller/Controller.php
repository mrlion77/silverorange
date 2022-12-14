<?php

namespace silverorange\DevTest\Controller;

use silverorange\DevTest\Context;
use silverorange\DevTest\Template;

abstract class Controller
{
    protected array $params = [];

    public function __construct(array $params)
    {
        $this->setParams($params);
        $this->loadData();
    }

    public function setParams(array $params): self
    {
        $this->params = $params;

        return $this;
    }

    public function getStatus(): string
    {
        return $_SERVER['SERVER_PROTOCOL'] . ' 200 OK';
    }

    public function getContentType(): string
    {
        return 'text/html';
    }

    abstract public function getContext(): Context;
    abstract public function getTemplate(): Template\Template;

    public function sendHeaders(): void
    {
        header($this->getStatus());
        header('Content-Type: ' . $this->getContentType());
    }

    protected function loadData(): void
    {
    }
}
