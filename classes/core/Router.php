<?php {

    class Router
    {

        public $request;
        public $response;
        protected $routes = [];

        public function __construct($request, $response)
        {
            $this->request = $request;
            $this->response = $response;
        }

        public function get($path, $callback)
        {
            $this->routes['get'][$path] = $callback;
        }

        public function post($path, $callback)
        {
            $this->routes['post'][$path] = $callback;
        }

        public function resolve()
        {
            $path = $this->request->getPath();
            $method = $this->request->method();
            $callback = $this->routes[$method][$path] ?? false;

            if ($callback === false) {
                $this->response->setStatusCode(404);
                return "Not found";
            }

            if (is_string($callback)) {
                return $this->renderView($callback);
            }

            if(is_array($callback)) {
                $callback[0] = new $callback[0];
            }

            return call_user_func($callback, $this->request);

        }

        public function renderView($view, $params = [])
        {
            $base = $this->loadBase();
            $header = $this->layoutContent('header');
            $footer = $this->layoutContent('footer');
            $main = $this->renderOnlyView($view, $params, true);
            $viewContent = $this->renderOnlyView($view, $params);

            $base = str_replace('{{main}}', $main, $base);
            $base = str_replace('{{header}}', $header, $base);
            $base = str_replace('{{content}}', $viewContent, $base);

            return str_replace('{{footer}}', $footer, $base);

        }

        protected function loadBase() {
            ob_start();
            include_once "../views/base.php";
            return ob_get_clean();
        }

        protected function layoutContent($layout)
        {
            ob_start();
            include_once "../views/layouts/$layout.php";
            return ob_get_clean();
        }

        protected function renderOnlyView($view, $params, $isMain = false)
        {

            if($isMain) {
                ob_start();
                include_once "../views/pages/$view/main.php";
                return ob_get_clean();
            } else {  
                foreach($params as $key => $value) {
                    $$key = $value;
                }
                ob_start();
                include_once "../views/pages/$view/$view.php";
                return ob_get_clean();
            }
        }

    }

}
