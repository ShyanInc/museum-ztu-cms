<?php

namespace core;

class Config
{
    protected static $instance;
    protected $params;

    private function __construct()
    {
        $this->params = [];
        $this->loadConfigFiles();
    }

    public function __set($name, $value)
    {
        $this->params[$name] = $value;
    }

    public function __get($name)
    {
        return $this->params[$name];
    }

    public static function get()
    {
        if (empty(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    private function loadConfigFiles()
    {
        /** @var array $Config */
        $directory = 'config';
        $config_files = scandir($directory);
        foreach ($config_files as $config_file) {
            $file_extension = substr($config_file, -4);
            if ($file_extension === '.php') {
                $path = $directory . "/$config_file";
                include $path;
            }
        }

        foreach ($Config as $config) {
            foreach ($config as $key => $value) {
                $this->$key = $value;
            }
        }
    }
}
