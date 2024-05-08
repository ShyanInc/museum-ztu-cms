<?php

namespace core;

class Core
{
    public $defaultLayoutPath = 'views/layouts/index.php';

    public $moduleName;
    public $actionName;
    public $router;
    public $template;

    private static $instance;

    public function __construct()
    {
        $this->template = new Template($this->defaultLayoutPath);
    }

    public function run($route)
    {
        $this->router = new Router($route);
        $params = $this->router->run();
        $this->template->setParams($params);
    }

    public function done()
    {
        $this->router->done();
        $this->template->display();
    }

    public static function getInstance()
    {
        if (empty(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }
}
