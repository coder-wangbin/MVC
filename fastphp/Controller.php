<?php
/**
 * Created by PhpStorm.
 * User: Cool乄浪子
 * Date: 2018/10/11
 * Time: 9:55
 */
class Controller{
    public $_views;

    public function __construct($className,$actionName)
    {
        $this->_views = new Views($className,$actionName);
    }
}