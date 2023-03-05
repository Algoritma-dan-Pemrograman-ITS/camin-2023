<?php

class App {

    protected $controller = 'Home';
    protected $method = 'index';
    protected $params = [];

    public function __construct()
    {
        $url = $this->parseURL();
        
        if(!array_key_exists(0, $url)){
            $url[0] = $this->controller;
        }

        // Controller
        if( file_exists('../app/controllers/' . $url[0] . '.php')){
            $this->controller = $url[0];
            unset($url[0]); // untuk menghapus $url[0]
            // var_dump($url);
        }

        // instansiasi classnya supaya bisa ambil methodnya
        require_once '../app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;

        if(!array_key_exists(1, $url)){
            $url[1] = $this->method;
        }
        
        // method
        if(method_exists($this->controller, $url[1])){
            $this->method = $url[1];
            unset($url[1]);
        }

        // params
        if( !empty($url) )
        {
            $this->params = array_values($url);
        }

        // jalankan controller & method, serta kirimkan params jika ada
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseURL()
    {
        if(isset($_GET['url'])){
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            
            // dipecah string url nya pakai func explode
            $url = explode('/', $url);
            return $url;
        }
    }
}

