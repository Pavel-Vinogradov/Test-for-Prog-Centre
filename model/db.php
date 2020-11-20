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
    public string $timestamp;

//Class constructor
    public function __construct()
    {
//        create standard methods  error handling
        try {
//           create connection
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->db", $this->name, $this->pass);
//
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    //creat function insert in SQL DB ** add parseInt
    public function insert($name, $description, $price)
    {
        // to get time-stamp for 'created' field
        $created = $this->timestamp = date('Y-m-d H:i:s');

        $sql = "INSERT INTO catalog.products SET name=:name, price=:price, description=:description,
                 created=:created";


        $stmt = $this->conn->prepare($sql);// preparing a request
        // bind values
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":price", $price);
        $stmt->bindParam(":description", $description);
        $stmt->bindParam(":created",  $created);
        $stmt->execute();
        //array transfer
        return true;
    }

// creat function read SQL
    public function read()
    {
        $data = [];
        $sql = "SELECT * FROM catalog.products";
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
        $sql = "UPDATE catalog.products SET name=$name , description=$description, price=$price WHERE id=$id ";
        $stmt = $this->conn->prepare($sql);// preparing a request
        $stmt->execute(['id' => $id, 'name' => $name, 'description' => $description, 'price' => $price]);//array transfer
        return true;
    }

// creat function Delete
    public function delete($id)
    {
        $sql = "DELETE FROM catalog.products WHERE id=$id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        return true;
    }

    //rowCount
    public function rowCount()
    {
        $sql = "SELECT * FROM catalog.products";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $rowCount = $stmt->rowCount();
    }

//get ID
    public function getProductsID($id)
    {
        $sql = "SELECT *FROM catalog.products WHERE id=$id";
        $stmt = $this->conn->prepare($sql);// preparing a request
        $stmt->execute(['id' => $id]);//array transfer
        return $result = $stmt->fetch(PDO::FETCH_ASSOC);
    }
}

$db = new dbConfig();

