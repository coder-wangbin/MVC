<?php
class Sql
{
    private $db_type;
    private $db_host;
    private $db_name;
    private $username;
    private $password;
    private $hostport;

    protected static $pdo;
    public static $_config;

    //构造方法链接数据库
    public function __construct()
    {
        $this->db_type = self::$_config['db_type'];
        $this->db_host = self::$_config['db_host'];
        $this->db_name = self::$_config['db_name'];
        $this->username = self::$_config['username'];
        $this->password = self::$_config['password'];
        $this->hostport = self::$_config['hostport'];
        self::$pdo = new PDO("$this->db_type:host=$this->db_host;dbname=$this->db_name",$this->username,$this->password);
    }

    //处理SQL语句
    private function handleSql($arr,$type)
    {
        $sql = "";
        foreach ($arr as $key => $val){
            if (is_numeric($val)){
                $sql .= "$key = $val $type";
            }else{
                $sql .= "$key = '$val' $type";
            }
        }
        $sql = trim($sql,"''|$type");
        return $sql;
    }

    //添加数据方法
    public function insert($arr)
    {
        $opType = ',';
        $handleSql = $this->handleSql($arr,$opType);
        $realSql = "insert into {$this->_table} set {$handleSql}";
        $res = self::$pdo->exec($realSql);
        return $res;
    }

    //修改数据方法
    public function update($arrValue,$arrWhere)
    {
        $strValue = $this->handleSql($arrValue,',');
        $strWhere = $this->handleSql($arrWhere,'and');
        $sql = "update {$this->_table} set {$strValue} where {$strWhere}";
        return self::$pdo->exec($sql);
    }

    //删除数据方法
    public function delete($arrWhere)
    {
        $strWhere = $this->handleSql($arrWhere,'AND');
        $sql = "delete from {$this->_table} where $strWhere";
        return self::$pdo->exec($sql);
    }

    //查询全部数据  以数组形式返回
    public function getAll()
    {

        $sql = "select * from {$this->_table}";
        var_dump($sql);die;
        
    }

    //传入条件 查询一条数据 以数组返回
    public function getOne($where)
    {
        $strWhere = $this->handleSql($where,'AND');
        $sql = "select * from {$this->_table} where $strWhere";
        return self::$pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }
    
    //执行原生SQL
	public function query($sql)
	{
		if (empty($sql)){
			return true;
		}else{
			return self::$pdo->query($sql);
		}
	}
}