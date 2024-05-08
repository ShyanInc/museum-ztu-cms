<?php

namespace core;

class Template
{
    protected $templateFilePath;
    protected $paramsArray;

    public function __set($name, $value)
    {
        Core::getInstance()->template->setParam($name, $value);
    }

    public function __construct($templateFilePath)
    {
        $this->templateFilePath = $templateFilePath;
        $this->paramsArray = [];
    }

    public function setTemplateFilePath($templateFilePath)
    {
        $this->templateFilePath = $templateFilePath;
    }

    public function setParam($paramName, $paramValue)
    {
        $this->paramsArray[$paramName] = $paramValue;
    }

    public function setParams($params)
    {
        foreach ($params as $key => $value) {
            $this->setParam($key, $value);
        }
    }

    public function getHTML()
    {
        ob_start();
        extract($this->paramsArray);
        include $this->templateFilePath;
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }

    public function display()
    {
        echo $this->getHTML();
    }
}
