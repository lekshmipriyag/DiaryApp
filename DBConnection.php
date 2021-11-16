<?php
class DBConnection
{
    public $connection;

    //Connection to the DB
    public function __construct()
    {
        $conn = new mysqli("localhost", "root", "", "db_diary4u");

        // Check connection
        if ($conn->connect_errno) {
            echo "Failed to connect to MySQL: " . $conn->connect_error;
            exit();
        } else {
            $this->connection = $conn;
        }
    }

    // Insert into DB Table
    public function dbInsert($tableName, $fieldNames, $columnValues)
    {

        $insertQuery = "INSERT INTO $tableName ($fieldNames) VALUES ($columnValues)";
        mysqli_query($this->connection, $insertQuery);
        $result = mysqli_insert_id($this->connection);
        return $result;
    }

    // select data from db to check whether email or username already exists or not 
    public function dbSelect($tableName, $cond1, $cond2)
    {

        $selectQuery = "SELECT * FROM $tableName WHERE ( $cond1 OR $cond2 )";
        $result =  mysqli_query($this->connection, $selectQuery);
        return $result;
    }

    //check whether the username or password exist in the db
    public function dbSelectLogin($tableName, $cond1, $cond2)
    {

        $selectQuery = "SELECT * FROM $tableName WHERE ( $cond1 AND $cond2 )";
        $result =  mysqli_query($this->connection, $selectQuery);
        return $result;
    }

    function dbSelectID($tableName, $cond)
    {
        $selectQuery = "SELECT * FROM $tableName WHERE ( $cond) ";
        $result =  mysqli_query($this->connection, $selectQuery);
        return $result;
    }

    function dbUpdate($tableName, $fieldName, $cond)
    {
        $updateQuery = "UPDATE $tableName SET $fieldName WHERE $cond";
        $result =  mysqli_query($this->connection, $updateQuery);
        return $result;
    }

    function dbDelete($tableName,  $cond){
        $deleteQuery = "DELETE FROM $tableName WHERE ( $cond) ";
        mysqli_query($this->connection, $deleteQuery);
    }

    function dbSelectValue($column, $tableName, $cond)
    {
        $selectQuery = "SELECT $column FROM $tableName WHERE ( $cond) ";
        $result =  mysqli_query($this->connection, $selectQuery);
        return $result;
    }
}
