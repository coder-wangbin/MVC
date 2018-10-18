<?php
class UserModel extends Model{
    public $_table = "user";

    public function getUserInfo(){
	    $name = "王彬";
	    $age  = "20";
        $sql = "INSERT INTO {$this->_table} set name = '$name',age = $age";
        $this->queryAll($sql);
    }
}