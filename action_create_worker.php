<?php
require "views/header.php";
include "./Entity/Worker.php";

require_once "database/DB_connection.php";
$department_id = $_POST['department_id'];
if($department_id == 1 || $department_id == 2 || $department_id == 3){
    echo "<section class=\"container mt-5\">
            <div class=\"d-flex justify-content-center mb-3 jumbotron text-info\">";
                // create new worker
                $new_worker = new Worker();
                $worker_name = $_POST['worker_name'];
                $department_id = $_POST['department_id'];
                $res = $new_worker->createWorker($worker_name, $department_id);
                // =============================================
   echo "</div></section>";
} else {
    echo "
        <div class='container mt-5'>
            <div class='d-flex justify-content-center mb-3 jumbotron text-info'>
               <div> Please choose department! </div>
            </div>
            <div>
                <button type='button' class='btn btn-outline-info'>
                    <a class='btn-link text-info' href='views/create_worker.php' style='text-decoration: none;'>Back</a>
                </button>
            </div>   
        </div>
    ";
}