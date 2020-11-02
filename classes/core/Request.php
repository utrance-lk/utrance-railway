<?php

class Request {

    public function getPath() {
        $path = $_SERVER['REQUEST_URI'] ?? '/';
        $position = strpos($path, '?');
        
        if($position === false) {
            return $path;
        }

        return substr($path, 0, $position);
        
    }

    public function method() {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    public function isGet() {
        return $this->method() == 'get';
    }

    public function isPost() {
        return $this->method() == 'post';
    }

    // new function
    public function getQueryParams() {
        $resultArray;
        $url = $_SERVER['REQUEST_URI'];
        $r = parse_url($url, PHP_URL_QUERY);
        // foreach(explode("&", $r) as $key => $value) {
        //     $temp = explode("=", $value);
        //     // var_dump($value);
        //     $resultArray[$temp[0]] = $temp[1];
        // }

        $list = (explode("&", $r));

        foreach($list as $key => $value) {
            $item = explode("=", $value);
            $resultArray[$item[0]] = $item[1];
        }
        
        return $resultArray;
    }
  

    public function getBody() {
        $body = [];
        if($this->method() == 'get') {
            foreach ($_GET as $key => $value) {
                // implement data sanitization part
                $body[$key] = $value;
            }
        }

        if($this->method() == 'post') {
            foreach ($_POST as $key => $value) {
                // implement data sanitization part
                $body[$key] = $value;
            }
        }

        return $body;

    }
}