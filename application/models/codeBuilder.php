<?php

/**
 * Created by PhpStorm.
 * User: JYiga
 * Date: 21/04/2017
 * Time: 3:55 PM
 */
class CodeBuilder extends Model
{
    private $tableName;
    private $className;
    private $conn;
    private $table_names;

    /**
     * @return mixed
     */
    public function getTableName()
    {
        return $this->tableName;
    }

    /**
     * @param mixed $tableName
     */
    public function setTableName($tableName)
    {
        $this->tableName = $tableName;
    }

    /**
     * @return mixed
     */
    public function getClassName()
    {
        return $this->className;
    }

    /**
     * @param mixed $className
     */
    public function setClassName($className)
    {
        $this->className = $className;
    }

    /**
     * @return mixed
     */
    public function getConn()
    {
        return $this->conn;
    }

    /**
     * @param mixed $conn
     */
    public function setConn($conn)
    {
        $this->conn = $conn;
    }

    /**
     * @return mixed
     */
    public function getTableNames()
    {
        return $this->table_names;
    }

    /**
     * @param mixed $table_names
     */
    public function setTableNames($table_names)
    {
        $this->table_names = $table_names;
    }



}