<?php

namespace App\Database;

class Connection 
{
    private $_connection = null;

    public function connect()
    {
        $this->_connection = mysqli_connect(
            DB_HOST, 
            DB_USER, 
            DB_PASSWORD, 
            DB_SCHEMA, 
            DB_PORT
        );

        if(!$this->_connection)
            throw new \Exception("No database connection");
    }

    public function fetchAll(string $query)
    {
        if(!$this->_connection)
            $this->connect();

        $this->result = mysqli_query($this->_connection, $query);
        if(!$this->result) return null;

        $data = array();
		while($row = mysqli_fetch_array($this->result, MYSQLI_ASSOC))
            $data[] = $row;
		
        $this->disconnect();

        return $data;
    }

    public function disconnect()
    {
        return mysqli_close($this->_connection);
    }
}

include __DIR__.'./config.php';
