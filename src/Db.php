<?php

/**
 * 数据库连接方法封装
 */
class Db
{
    /**
     * 数据库配置
     */
    private $host = '127.0.0.1';
    private $user = 'root';
    private $password = ''; // 请在此修改数据库密码
    private $database = 'self_destruct';
    private $port = '3306';

    /**
     * 数据库连接
     */
    private $_dbLink;

    /**
     * 数据库连接函数
     */
    public function connect($host, $user, $password, $database, $port)
    {
        if ($this->_dbLink = @new MySQLi($host, $user, $password, $database, (empty($port) ? '' : $port))) {
            return $this->_dbLink;
        }
    }

    /**
     * 执行单条数据库语句
     */
    public function query($query)
    {
        $this->_dbLink = $this->connect($this->host, $this->user, $this->password, $this->database, $this->port);
        if ($resource = @$this->_dbLink->query($query)) {
            return $resource;
        }
        $this->_dbLink->close();
    }

    /**
     * 批量执行多条数据库语句
     */
    public function multi_query($query)
    {
        $this->_dbLink = $this->connect($this->host, $this->user, $this->password, $this->database, $this->port);
        if ($resource = @$this->_dbLink->multi_query($query)) {
            return $resource;
        }
        $this->_dbLink->close();
    }
}

?>