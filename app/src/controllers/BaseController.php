<?php

namespace App\controllers;

abstract class BaseController
{
    private $templateFile = __DIR__ . './../views/template.php';
    private $viewsDir = __DIR__ . './../Views/Frontend/';
    protected $params;

    public function __construct(string $action, array $params = [])
    {
        $this->params = $params;

        $method = 'execute' . ucfirst($action);
        if (is_callable([$this, $method])) {
            $this->$method();
        }
    }

    //TODO API: send data only
    public function render(string $template, array $arguments, string $title)
    {
        $view = $this->viewsDir . $template;

        foreach ($arguments as $key => $value) {
            ${$key} = $value;
        }

        ob_start();
        require $view;
        $content = ob_get_clean();
        require $this->templateFile;
        exit;
    }
}