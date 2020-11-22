<?php

// create class
class dbConfig
{
    // Class properties: host, name, password, db name,connection
//    private string $host = 'localhost';
//    private string $name = 'root';
//    private string $pass = 'qwerty1234';
//    private string $db = 'catalog';
//    protected ?PDO $conn = null;
//    public string $timestamp;
    private string $host = 'b8rg15mwxwynuk9q.chr7pe7iynqr.eu-west-1.rds.amazonaws.com';
    private string $name = 'yu952l62ub6r03gl';
    private string $pass = 'tua4394ez0do22mu';
    private string $db = 'ez2qcqlipbwyb7mt';
    protected ?PDO $conn = null;
    public string $timestamp;

//Class constructor
    public function __construct()
    {
//        create standard methods  error handling
        try {
//           create connection
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->db;charset=utf8; ", $this->name, $this->pass);
//
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    //creat function insert in SQL DB ** add parseInt
    public function insert(string $name, string $description, float $price)
    {
        // to get time-stamp for 'created' field

        $created = $this->timestamp = date('Y-m-d H:i:s');

        $sql = "INSERT INTO ez2qcqlipbwyb7mt.products SET name=:name, price=:price, description=:description,
                 created=:created";
        $stmt = $this->conn->prepare($sql);// preparing a request
        // bind values
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":price", $price);
        $stmt->bindParam(":description", $description);
        $stmt->bindParam(":created", $created);
        //array transfer
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

// creat function read SQL
    public function read()
    {
        $data = [];
        $sql = "SELECT * FROM ez2qcqlipbwyb7mt.products";
        $stmt = $this->conn->prepare($sql);// preparing a request
        $stmt->execute();//array transfer
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);// create associative array
        foreach ($result as $item) {
            $data[] = $item;
        }
        return $data;
    }


//   creat function update
    public function update($id, $name, $description, $price)
    {
        $sql = "UPDATE ez2qcqlipbwyb7mt.products SET name=:name , price=:price, description=:description WHERE id=:id ";
        $stmt = $this->conn->prepare($sql);// preparing a request
        // bind parameters
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':id', $id);

        // execute the query
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }


    }

// creat function Delete
    public function delete($id)
    {
        $sql = "DELETE FROM ez2qcqlipbwyb7mt.products WHERE id=$id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        return true;
    }

    // used for paging products
    public function rowCount()
    {
        $sql = "SELECT * FROM ez2qcqlipbwyb7mt.products";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $rowCount = $stmt->rowCount();
    }

//get ID
    public function getProductsID($id)
    {
        $sql = "SELECT *FROM ez2qcqlipbwyb7mt.products WHERE id=$id";
        $stmt = $this->conn->prepare($sql);// preparing a request
        $stmt->execute(['id' => $id]);//array transfer
        return $result = $stmt->fetch(PDO::FETCH_ASSOC);
    }
}


$db = new dbConfig();


