<?php

namespace core;

class Controller
{
    protected $template;

    public $isPost = false;
    public $isGet = false;
    public $post;
    public $get;

    public function __construct()
    {
        $action = Core::getInstance()->actionName;
        $module = Core::getInstance()->moduleName;
        $path = "views/{$module}/{$action}.php";
        $this->template = new Template($path);
        switch ($_SERVER['REQUEST_METHOD']) {
            case 'GET':
                $this->isGet = true;
                break;
            case 'POST':
                $this->isPost = true;
                break;
        }
        $this->post = new Post();
        $this->get = new Get();
    }

    public function render($pathToView = null)
    {
        if (!empty($pathToView)) {
            $this->template->setTemplateFilePath($pathToView);
        }
        return [
            'Content' => $this->template->getHTML(),
        ];
    }

    public function redirect($path)
    {
        header('Location: ' . $path);
        die;
    }
}