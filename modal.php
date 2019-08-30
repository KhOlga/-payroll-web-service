<?php
require "views/header.php";
require_once "database/DB_connection.php";
require "Entity/Worker.php";
require "Entity/Department.php";
require "Entity/Product.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $worker_id = $_POST['search'];

    $payroll = htmlspecialchars($_REQUEST['payroll']);
    if (empty($payroll)) {
        echo "Name is empty";
    } else {

        echo "<section class=\"container mt-5\">
            <div class=\"d-flex justify-content-center mb-3 jumbotron text-info\">";
        $worker = new Worker();
        $res = $worker->updateWorker($worker_id, $payroll);
        echo "</div></section>";

    }
}



