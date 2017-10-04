<?php
echo '<pre>';
echo 'index.php of /api/shop<br>';

$method = $_SERVER['REQUEST_METHOD'];
$url = $_SERVER['REQUEST_URI'];

list($ip, $us, $rest, $server, $api, $shop, $func, $args) = explode('/', $url, 8);
$arr = list($s, $a, $d, $db, $table, $path) = explode('/', $url, 6);
var_dump($arr);
//var_dump($path);
//var_dump($us);
//var_dump($rest);
//var_dump($api);
//var_dump($shop);
//var_dump($func);
//var_dump($args);

//var_dump($_SERVER);
class Shop
{
    protected $method;
    protected $func;
    protected $args;
    protected $url; 

    public function __construct()
    {
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->url = $_SERVER['REQUEST_URI'];
    }
    public function run()
    {
        list($this->ip, $this->us, $this->rest,
            $this->server,
            $this->api,
            $this->shop, $this->func) = explode('/', $this->url, 6);

        switch($this->method)
        {
        case 'GET':
            $this->setMethod('get'.ucfirst($this->func), explode('/', $path));
            break; :wq

        case 'DELETE':
            $this->setMethod('delete'.ucfirst($table), explode('/', $path));
            break;
        case 'POST':
            $this->setMethod('post'.ucfirst($table), explode('/', $path));
            break;
        case 'PUT':
            $this->setMethod('put'.ucfirst($table), explode('/', $path));
            break;
        default:
            return false;
        }

    }

    function setMethod($method, $param=false)
    {
        if ( method_exists($this, $method) )
        {
            call_user_func();
        }
    }

    public function getCars()
    {
        return 'GETCARS';
    }


}
