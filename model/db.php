<?php

// create class
class dbConfig
{
    // Class properties: host, name, password, db name,connection
    private string $host = 'localhost';
    private string $name = 'root';
    private string $pass = 'qwerty1234';
    private string $db = 'catalog';
    protected ?PDO $conn = null;

//Class constructor
    public function __construct()
    {
//        create standard methods  error handling
        try {
//           create connection
            $this->conn=new PDO( "mysql:host=$this->host;dbname=$this->db",$this->name,$this->pass);

        }
        catch (PDOException $e)
        {
            echo $e->getMessage();
        }
    }
}
