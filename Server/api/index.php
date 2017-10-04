<?php
class RestServer
{
    protected $_response = null;

    public function __construct()
    {
        $this->reqMethod = $_SERVER['REQUEST_METHOD'];
        $this->url = $_SERVER['REQUEST_URI'];
        // $this->test_url = explode('.',$this->url)
        $this->test = explode('/api',$this->url); 

        $this->getResponseType();
    }

    public function start()
    {
        list($s, $a, $d, $f, $db, $table, $path) = explode('/', $this->url, 7);

        $this->getArgs();

        switch($this->reqMethod)
        {
        case 'GET':
            $this->setMethod('get'.ucfirst($table));
            break;
        case 'DELETE':
            $this->setMethod('delete'.ucfirst($table));
            break;
        case 'POST':
            $this->setMethod('post'.ucfirst($table));
            break;
        case 'PUT':
            $this->setMethod('put'.ucfirst($table));
            break;
        default:
            return false;
        }
    }

    protected function getData()
    {
    }

    protected function getResponseType()
    {

        if(strripos($this->url, '.json'))
        {
            $this->url = substr($this->url, 0, strlen($this->url)-4);
            $this->responseType = 'json';
        }
        else
        {
          $this->responseType = 'json';
  
        }
    }

    protected function _cleanInputs($data) {
        $input = Array();
        if (is_array($data)) 
        {
            foreach ($data as $k => $v) 
            {
                $input[$k] = $this->_cleanInputs($v);
            }
        } 
        else 
        {
            $input = trim(strip_tags($data));
        }
        return $input;
    }

    protected function getArgs()
    {
        switch($this->reqMethod) {
        case 'DELETE':
        case 'POST':
            $this->request = $this->_cleanInputs($_POST);
            break;
        case 'GET':
            $this->request = $this->_cleanInputs($_GET);
            break;
        case 'PUT':
            $this->request = $this->_cleanInputs($_GET);
            $this->file = file_get_contents("php://input");
            break;
        default:
            //   $this->_response('Invalid Method', 405);
            break;
        }
        return $this;
    }

    protected function setMethod($meth)
    {
        if ( method_exists($this, $meth) )
        { 
            $this->$meth($this->request);
        }
    }

}


