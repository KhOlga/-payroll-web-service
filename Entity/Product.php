<?php
require_once "database/DB_connection.php";

class Product
{
    public $product_id;
    public $product_name;
    public $net_price;
    public $products_amount;
    public $worker_id;
    public $department_id;
    public $made_products_id;

    /**
     * @return mixed
     */
    public function getProductId()
    {
        return $this->product_id;
    }

    /**
     * @param mixed $product_id
     */
    public function setProductId($product_id)
    {
        $this->product_id = $product_id;
    }

    /**
     * @return mixed
     */
    public function getProductName()
    {
        return $this->product_name;
    }

    /**
     * @param mixed $product_name
     */
    public function setProductName($product_name)
    {
        $this->product_name = $product_name;
    }

    /**
     * @return mixed
     */
    public function getNetPrice()
    {
        return $this->net_price;
    }

    /**
     * @param mixed $net_price
     */
    public function setNetPrice($net_price)
    {
        $this->net_price = $net_price;
    }

    /**
     * @return mixed
     */
    public function getProductsAmount()
    {
        return $this->products_amount;
    }

    /**
     * @param mixed $products_amount
     */
    public function setProductsAmount($products_amount)
    {
        $this->products_amount = $products_amount;
    }

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
    public function getMadeProductsId()
    {
        return $this->made_products_id;
    }

    /**
     * @param mixed $made_products_id
     */
    public function setMadeProductsId($made_products_id)
    {
        $this->made_products_id = $made_products_id;
    }

    public function showProductNetPrice($product_id)
    {
        try {
            $conn = DB_connection();
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT net_price FROM products WHERE product_id = '$product_id'";
            $result = $conn->query($sql);

            return $result->fetch();
        }
        catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        $conn = null;
    }

    public function createProducedProduct($product_id, $worker_id, $department_id)
    {
        try {
            $db_connect = DB_connection();

            $sql = "INSERT INTO made_products (product_id, worker_id, products_amount) VALUES ('{$product_id}', '{$worker_id}', '{$department_id}')";

            $db_connect->exec($sql);
            echo "New record created successfully";
        }
        catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        $conn = null;
    }

    public function showProductsAmount($worker_id)
    {
        try {
            $conn = DB_connection();
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT products_amount FROM made_products WHERE worker_id = '$worker_id'";
            $result = $conn->query($sql);

            return $result->fetch();
        }
        catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        $conn = null;
    }

}
