<?php
require_once "database/DB_connection.php";

class Department
{
    public $department_id;
    public $department_name;

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

    /**
     * @return mixed
     */
    public function getDepartmentName()
    {
        return $this->department_name;
    }

    /**
     * @param mixed $department_name
     */
    public function setDepartmentName($department_name)
    {
        $this->department_name = $department_name;
    }

    public function showDepartmentName($department_id)
    {
        try {
            $conn = DB_connection();
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT department_name FROM departments WHERE department_id = '$department_id'";
            $result = $conn->query($sql);

            return $result->fetch();
        }
        catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        $conn = null;
    }

}