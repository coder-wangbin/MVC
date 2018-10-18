<?php
class IndexModel extends Model{
	
	//给模型定义表名
	public $_table = "index";
	
	//获取表内全部数据
	public function getAlls()
	{
		return $this -> getAll();
	}
	
	
}