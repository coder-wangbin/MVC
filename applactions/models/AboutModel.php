<?php
/**
 * Created by PhpStorm.
 * User: Cool乄浪子
 * Date: 2018/10/17
 * Time: 15:03
 */
class AboutModel extends Model
{
	//给模型定义表名
	public $_table = "about";
	
	//获取表内全部数据
	public function getAlls()
	{
		return $this -> getAll();
	}
}