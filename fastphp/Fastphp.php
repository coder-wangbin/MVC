<?php
class Fastphp
{
    public $_config;
    public function __construct($arr)
    {
        $this ->_config = $arr;
    }

    //路由规则
    public function route(){
        $arrUrl = explode('?',trim($_SERVER['REQUEST_URI'],'/'));
        @$arrInfo = $arrUrl[1];
        $secondInfo = explode("&",$arrInfo);
        $arrTmp = [];
        foreach ($secondInfo as $key => $val){
            $c = explode('=',$val);
            $arrTmp[] = $c;
        }
        @$className = ucfirst($arrTmp[0][1]);
        @$actionName = $arrTmp[1][1];
        //var_dump($className);die;

//        $objc = new $className($className,$actionName);
//        $objc -> $actionName();
	    if (empty($className)&&empty($actionName)){$className = 'Index';$actionName= "indexs";}
        $obj=new $className($className,$actionName);
        call_user_func_array([$obj,$actionName],[]);
    }

    //运行方法
    public function run(){
        spl_autoload_register([$this,'loadClass']);
        Model::$_config = $this->_config['db'];
        $this->route();
    }


    // 检测开发环境
    public function setReporting()
    {
        if (APP_DEBUG === true) {
            error_reporting(E_ALL);
            ini_set('display_errors','On');
        } else {
            error_reporting(E_ALL);
            ini_set('display_errors','Off');
            ini_set('log_errors', 'On');
        }
    }

    //删除敏感字符
    public function stripSlashesDeep($value){
        //$value = is_array($value) ? array_map(array($this, 'stripSlashesDeep'), $value) : stripslashes($value);
        if (is_array($value)){
            array_map(array($this, 'stripSlashesDeep'), $value);
        }else{
            stripslashes($value);
            htmlspecialchars($value);
        }
        return $value;
    }

    //检测敏感字符并删除
    public function removeMagicQuotes()
    {
        if (get_magic_quotes_gpc()) {
            $_GET = isset($_GET) ? $this->stripSlashesDeep($_GET ) : "";
            $_POST = isset($_POST) ? $this->stripSlashesDeep($_POST ) : "";
            $_COOKIE = isset($_COOKIE) ? $this->stripSlashesDeep($_COOKIE) : "";
            $_SESSION = isset($_SESSION) ? $this->stripSlashesDeep($_SESSION) : "";
        }
    }



    //类的自动加载机制
    //当在控制器里面 new一个方法无需加载对应的类库就可以使用的原因
    public function loadClass($class){
        //找到框架目录
        $freamkwork = APP_PATH."fastphp/".$class.".php";
        $controllers = APP_PATH."applactions/controllers/".$class.".php";
        $views = APP_PATH."applactions/views/".$class.".php";
        $models = APP_PATH."applactions/models/".$class.".php";
        $classesPath = APP_PATH."applactions/classes/".$class.".php";

        //判断文件是否存在
        if(file_exists($freamkwork)){
            include $freamkwork;
        }elseif (file_exists($controllers)) {
            include $controllers;
        }elseif(file_exists($views)){
            include $views;
        }elseif(file_exists($models)){
            include $models;
        }elseif(file_exists($classesPath)){
            include $classesPath;
        }
    }
}