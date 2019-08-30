<?php
require_once "database/DB_connection.php";

class Worker
{
    public $worker_id;
    public $worker_name;
    public $department_id;


    /**
     * @return mixed
     */
    public function getWorkerId()
    {
        return $this->worker_id;
    }

    /**
     * @param mixed $worker_id
     */
    public function setWorkerId($worker_id)
    {
        $this->worker_id = $worker_id;
    }

    /**
     * @return mixed
     */
    public function getWorkerName()
    {
        return $this->worker_name;
    }

    /**
     * @param mixed $worker_name
     */
    public function setWorkerName($worker_name)
    {
        $this->worker_name = $worker_name;
    }

    /**
     * @return mixed
     */
    public function getDepartmentId()
    {
        return $this->department_id;
    }

    /**
     * @param mixed $department_id
     */
    public function setDepartmentId($department_id)
    {
        $this->department_id = $department_id;
    }


    public function createWorker($worker_name, $department_id)
    {
        try {
        $db_connect = DB_connection();

        $sql = "INSERT INTO workers (worker_name, department_id) VALUES ('{$worker_name}', '{$department_id}')";

        $db_connect->exec($sql);
        echo "New record created successfully";
        }
        catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        $conn = null;
    }


    public function showWorker($worker_name)
    {
        try{
            $conn = DB_connection();
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "SELECT * FROM workers WHERE worker_name = '$worker_name'";

            $stmt = $conn->query($sql);
            //$stmt = $conn->prepare("SELECT * FROM workers WHERE worker_name = '$worker_name'");

            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);

            $arrayKey = array();
            $arrayValue = array();

            foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $key=>$value) {
                array_push($arrayKey, $key);
                array_push($arrayValue, $value);
            }
            $array = array_combine ($arrayKey, $arrayValue);

            return $array;
        }
        catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

        $conn = null;

    }

    public function iDWorkersInDepartment($department_id)
    {
        try {
            $conn = DB_connection();
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "SELECT worker_id FROM workers WHERE department_id = '$department_id'";
            $stmt = $conn->prepare($sql);

            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);


            $arrayValue = array();

            foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $key=>$value) {
                array_push($arrayValue, $value);

            }
            echo "<pre>";

            return $arrayValue;
            //print_r($arrayValue);


        }
        catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

        $conn = null;


    }

    public function showWorkerNames($worker_id)
    {
        try {
            $conn = DB_connection();
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT worker_name FROM workers WHERE worker_id = '$worker_id'";
            $result = $conn->query($sql);

            $arrayKey = array();
            $arrayValue = array();

            foreach(new TableRows(new RecursiveArrayIterator($result->fetchAll())) as $key=>$value) {
                array_push($arrayKey, $key);
                array_push($arrayValue, $value);
            }
            $array = array_combine ($arrayKey, $arrayValue);

            return $array;

        }
        catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        $conn = null;

    }

    public function takeWorkerName($worker_id)
    {
        try {
            $conn = DB_connection();
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT worker_name FROM workers WHERE worker_id = '$worker_id'";
            $result = $conn->query($sql);

            return $result->fetch();
        }
        catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        $conn = null;
    }

    public function takeDepartmentID($worker_id)
    {
        try {
            $conn = DB_connection();
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT department_id FROM workers WHERE worker_id = '$worker_id'";
            $result = $conn->query($sql);

            return $result->fetch();
        }
        catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        $conn = null;
    }

    public function updateWorker($worker_id, $payroll)
    {
        try {
            $db_connect = DB_connection();

            $sql = "UPDATE workers SET salary='$payroll' WHERE worker_name='$worker_id'";

            $db_connect->exec($sql);
            echo "New record created successfully";
        }
        catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        $conn = null;
    }

}