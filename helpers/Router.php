<?php

class Router {

    private $route = [];
    private $controller_path = '';

    function setConteollerPath($path) {
        $this->controller_path = $path;
    }

    function any($uri, $controller, $allow_no_auth = false) {
        $this->route[$uri] = [
            'controller' => $controller,
            'require_auth' => !$allow_no_auth
        ];
    }

    function run() {
        $uri = isset($_SERVER['REDIRECT_URL']) ? $_SERVER['REDIRECT_URL'] : $_SERVER['REQUEST_URI'];
        $uri = $this->explode_uri($uri);

        foreach ($this->route as $route => $config) {
            $controller = $config['controller'];
            $require_auth = $config['require_auth'];
            $route = $this->explode_uri($route);

            if (count($uri) != count($route)) {
                continue;
            }

            $match = true;
            $params = [];
            for ($i = 0; $i < count($route); $i++) {
                if ($route[$i] == ':num') {
                    if (is_numeric($uri[$i])) {
                        $params[] = intval($uri[$i]);
                    } else {
                        $match = false;
                        break;
                    }
                } elseif ($route[$i] != $uri[$i]) {
                    $match = false;
                    break;
                }
            }

            if ($match) {
                if($require_auth){
                    checkAuthenticationOrGoHome();
                }
                $controller = explode(".", $controller);
                if (count($controller) < 2) {
                    $controller[1] = 'index';
                }
                include $this->controller_path . '/' . $controller[0] . '.php';
                $classname = $controller[0];
                $methodname = $controller[1];

                $classname = explode("/", $classname);
                $classname = array_pop($classname);

                $handler = new $classname();
                call_user_func_array([$handler, $methodname], $params);
                return true;
            }
        }
        return false;
    }

    private function explode_uri($uri) {
        $uri = explode("/", $uri);
        $uri = array_filter($uri);
        return array_values($uri);
    }

}
