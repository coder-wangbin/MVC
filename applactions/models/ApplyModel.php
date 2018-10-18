<?php
/**
 * Created by PhpStorm.
 * User: Cool乄浪子
 * Date: 2018/10/17
 * Time: 15:03
 */
class ApplyModel extends Model
{
	//定义模型对应的表名
	public $_table = "apply";
	
	//获取表内全部数据
	public function getAlls()
	{
		return $this -> getAll();
	}
	
}