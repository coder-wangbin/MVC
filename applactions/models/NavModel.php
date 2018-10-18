<?php
/**
 * Created by PhpStorm.
 * User: Cool乄浪子
 * Date: 2018/10/17
 * Time: 15:02
 */
class NavModel extends Model
{
	//定义模型对应的表名
	public $_table = "nav";
	
	//获取表内全部数据
	public function getAlls()
	{
//		echo 1;die;
		$nav = $this->getAll();
//		return $this -> getAll();
	}
}