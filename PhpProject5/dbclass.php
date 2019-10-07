<?php 
require_once 'functions.php';



class Db
{
    private $dbHost;
    private $serverUser;
    private $serverPass;
    private $databaseName;
    private $conn = null;

    public function _construct(){
        var_dump("hello");
        $this->dbHost = "localhost";
        $this->serverUser = "root";
        $this->serverPass = "";
        $this->databaseName = "tutorial";

        $this->conn = new mysqli($this->dbHost,$this->serverUser,$this->serverPass,$this->databaseName);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        echo "Connected successfully";
        
    }

    function connectDb(){
        // var_dump("hello");
        // $this->dbHost = "localhost";
        // $this->serverUser = "root";
        // $this->serverPass = "";
        // $this->databaseName = "tutorial";

        // $this->conn = new mysqli($this->dbHost,$this->serverUser,$this->serverPass,$this->databaseName);

        // if ($this->conn->connect_error) {
        //     die("Connection failed: " . $conn->connect_error);
        // }
        // echo "Connected successfully";      
    }
    
    function insertLog($clientIp, $serverDate, $clientTime) 
    {        
        $query = "INSERT INTO ip(id,client_ip,server_datetime,client_datetime) VALUES ('','$clientIp','$serverDate','$clientTime')";
        var_dump($query);
        mysqli_query($this->conn,$query);
    }

    

    function getLog(){
        $result = mysqli_query($conn, "SELECT * FROM ip");
        $data =array();
        while($row = mysqli_fetch_assoc($result)){
            $data[] = $row;
        }
        echo json_encode($data);
    }

    function closeDb(){
        $conn -> close();
    }
        
   

}