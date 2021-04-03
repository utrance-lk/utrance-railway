<?php {

    include_once "../middlewares/AuthMiddleware.php";
    include_once "Controller.php";
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
                $controller = new Controller();
                return $controller->render(['error', 'error404']);
            }

            if (is_string($callback)) {
                return $this->renderView($callback);
            }

            if (is_array($callback)) {
                $callback[0] = new $callback[0];
            }

            return call_user_func($callback, $this->request, $this->response);

        }

        public function renderView($view, $params = [])
        {
            $base = $this->loadBase();
            $footer = $this->layoutContent('footer');
            $header = $this->layoutContent('header');

            $viewContent = $this->renderOnlyView($view, $params);

            $base = str_replace('{{header}}', $header, $base);
            $base = str_replace('{{content}}', $viewContent, $base);

            return str_replace('{{footer}}', $footer, $base);
        }

        protected function loadBase()
        {
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

        protected function renderOnlyView($view, $params)
        {
            foreach ($params as $key => $value) {
                $$key = $value;
            }
            ob_start();
            if (is_array($view)) {

                $view = implode('/', $view);
                include_once "../views/pages/$view.php";
            } else {
                include_once "../views/pages/$view/$view.php";
            }
            return ob_get_clean();
        }

    }

}
