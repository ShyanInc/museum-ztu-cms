<?php

namespace core;

class Core
{
    public $defaultLayoutPath = 'views/layouts/index.php';
    public $rootDirPath = __DIR__ . DIRECTORY_SEPARATOR . '..';

    public $moduleName;
    public $actionName;
    public $router;
    public $template;
    public $db;
    public $session;
    public Controller $controllerObject;

    private static $instance;

    public function __construct()
    {
        $this->template = new Template($this->defaultLayoutPath);

        $host = Config::get()->dbHost;
        $name = Config::get()->dbName;
        $login = Config::get()->dbLogin;
        $password = Config::get()->dbPassword;
        $this->db = new DB($host, $name, $login, $password);
        $this->session = new Session();
        session_start();
    }

    public function run($route)
    {
        $this->router = new Router($route);
        $params = $this->router->run();
        if (!empty($params)) {
            $this->template->setParams($params);
        }
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
