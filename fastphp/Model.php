<?php
class Model extends Sql {
    //直接执行SQL
    public function queryAll($sql)
    {
	    return parent::query($sql); // TODO: Change the autogenerated stub
    }
	
	//增加数据   可以传进来数组
    public function insert($arr)
    {
	    return parent::insert($arr); // TODO: Change the autogenerated stub
    }
	
	//删除数据  可以传进来数组
    public function delete($arrWhere)
    {
	    return parent::delete($arrWhere); // TODO: Change the autogenerated stub
    }
	
	//修改数据  可以传进来数组
	public function update($arrValue, $arrWhere)
	{
		return parent::update($arrValue, $arrWhere); // TODO: Change the autogenerated stub
	}
	
	//查询数据
	public function getAll()
	{
		return parent::getAll(); // TODO: Change the autogenerated stub
	}
	
	//查询一条数据
	public function getOne($where)
	{
		return parent::getOne($where); // TODO: Change the autogenerated stub
	}
}