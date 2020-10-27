<?php

class Database {

    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $name = DB_NAME;

    private $mysqli;

    public function __construct(){

        $this->mysqli = new mysqli(
            $this->host,
            $this->user,
            $this->pass,
            $this->name
        );


        if ($this->mysqli->connect_error){
            die('Connection fail to mysql '. $this->mysqli->connect_error);
        }
    }

    public function addCustomer($data){

        $stat = $this->mysqli->prepare("INSERT INTO customers (id, first_name, last_name, email) VALUES (?, ?, ?, ?);");
        $stat->bind_param('ssss', $data['id'], $data['first_name'], $data['last_name'], $data['email'] );

        if ($stat->execute()){
            return true;
        }else {
            return false;
        }
    }

    public function getCustomers(){
        $stat = $this->mysqli->query("SELECT * FROM customers ORDER BY created_at DESC");
        return $stat->fetch_all(MYSQLI_ASSOC);
    }

    public function addTransitions($data){

        $stat = $this->mysqli->prepare("INSERT INTO transitions (id, customer_id, product, amount, currency, status) VALUES (?, ?, ?, ?, ?, ?);");
        $stat->bind_param('sssiss', $data['id'], $data['customer_id'], $data['product'], $data['amount'], $data['currency'], $data['status'] );

        if ($stat->execute()){
            return true;
        }else {
            return false;
        }
    }


    public function getTransitions(){
        $stat = $this->mysqli->query("SELECT * FROM transitions ORDER BY created_at DESC");
        return $stat->fetch_all(MYSQLI_ASSOC);
    }
}