<?php
namespace App\config\routes;

use App\controllers\ErrorController;
use DOMDocument;

class Router
{
    //TODO public function getView()

    public function getController()
    {
        $xml = new DOMDocument();
        $xml->load(__DIR__ .'/routes.xml');
        $routes = $xml->getElementsByTagName('route');

        isset($_GET['path']) ? $path = strtolower(htmlspecialchars($_GET['path'])) : $path = '/';

        foreach ($routes as $route) {
            if ($path === $route->getAttribute('path')) {
                $controllerClass = 'App\\controllers\\' . $route->getAttribute('controller');
                $action = $route->getAttribute('action');
                $params = [];
                if ($route->hasAttribute('params')) {
                    $paramsArray = explode(',', $route->getAttribute('params'));
                    foreach ($paramsArray as $param) {
                        $params[$param] = $_GET[$param];
                    }
                }
                //TODO no return controller => just new instance which executes, return view
                return new $controllerClass($action, $params);
                //TODO render view with data
            }
        }
       return new ErrorController('error404');
        //return "rien";
    }
}