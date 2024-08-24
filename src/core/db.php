<?php
namespace Dev\Mo\core;

class db 
{
    private $table;
    private $sql;
    private $connection;

    public function __construct($table)
    {
        $this->connection = mysqli_connect($_ENV['DB_HOST'], $_ENV['DB_USER'], $_ENV['DB_PASSWORD'], $_ENV['DB_NAME']);
        $this->table = $table;
    }

    public function insert($data)
    {
    //     echo "<pre>";
    //    print_r($data);die;
        $columns = "";
        $values = "";
        foreach ($data as $column => $value) {
            $columns .= "`$column`,";
            $values .= " '$value',";
        
        }
        $columns = rtrim($columns, ",");
        $values = rtrim($values, ",");

        $this->sql = "INSERT INTO $this->table ($columns) VALUES ($values)";
        // print_r($this->sql);die;
        return $this;
    }

    public function select($columns = "*")
    {
        $this->sql = "SELECT $columns FROM $this->table";
        return $this;
    }

    public function update($data)
    {
        $rows = "";
        foreach ($data as $column => $value) {
            $rows .= "`$column` = '$value',";
        }
        $rows = rtrim($rows, ",");

        $this->sql = "UPDATE $this->table SET $rows";

        return $this;
    }

    public function delete()
    {
        $this->sql = "DELETE FROM `$this->table`";
        return $this;
    }

    public function join($type, $table, $pk, $fk)
    {
        $this->sql .= " $type JOIN `$table` ON $pk = $fk";
        return $this;
    }

    public function innerJoin($table, $pk, $fk)
    {
        $this->join('inner', $table, $pk, $fk);
        return $this;
    }

    public function leftJoin($table, $pk, $fk)
    {
        $this->join('left', $table, $pk, $fk);
        return $this;
    }

    public function rightJoin($table, $pk, $fk)
    {
        $this->join('right', $table, $pk, $fk);
        return $this;
    }

    public function execute()
    {
        mysqli_query($this->connection, $this->sql);
        return mysqli_affected_rows($this->connection);
    }

    public function all()
    {
        $query = mysqli_query($this->connection, $this->sql);
        return mysqli_fetch_all($query, MYSQLI_ASSOC);
    }

    public function get()
    {
        $query = mysqli_query($this->connection, $this->sql);
        return mysqli_fetch_assoc($query);
    }

    public function where($column, $operator, $value)
    {
        $this->sql .= " WHERE `$column` $operator '$value'";
        return $this;
    }

    public function andWhere($column, $operator, $value)
    {
        $this->sql .= " AND `$column` $operator '$value'";
        return $this;
    }

    public function orWhere($column, $operator, $value)
    {
        $this->sql .= " OR `$column` $operator '$value'";
        return $this;
    }
}
