<?php
require "views/header.php";
require_once "database/DB_connection.php";
require "TableRows.php";
require "Entity/Worker.php";
require "Entity/Department.php";
require "Entity/Product.php";

?>
<section class="row">
    <div class="col-12" style="margin: 50px"><h4>Result of your search:</h4></div>
    <div class="col-12 row container">
        <?php
        $search = $_POST['search'];

        if(!empty($search)){
           // search worker in DB
            $new_worker = new Worker();
            $result = $new_worker->showWorker($search);
            $worker_id = $result['worker_id'];
            // =============================================

    // search department name in DB
    $department_id = $result['department_id'];
    $dn = new Department();
    $res = $dn->showDepartmentName($department_id);
    // =============================================

            $product = new Product();
            $amount = $product->showProductsAmount($worker_id);
    echo "
            <div class=\"col-3\"></div>
                <div class=\"col-6\">
                    <h2><?php echo $search . \" \"; ?>profile</h2>
        
                    <table class=\"table table-bordered\">
                        <thead class=\"table-info\">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Department</th>
                            <th>Amount of produced products</th>
                            <th>Salary</th>
        
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
            ";
                        echo "<td>" . ($result['worker_id']) . "</td>";
                        echo "<td>" . ($result['worker_name']) . "</td>";
                        echo "<td>" . ($res['department_name']) . "</td>";
                        echo "<td>" . ($amount['products_amount']) . "</td>";
                        echo "<td>" . ($result['salary']) . "</td>";
                        echo "
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class=\"col-3\"></div>
            </div>
        </section>
            ";
    } else {
            echo "
                <div class='container mt-5'>
                    <div class='d-flex justify-content-center mb-3 jumbotron text-info'>
                       <div> Please enter worker's name! </div>
                    </div>
                    <div>
                        <button type='button' class='btn btn-outline-info'>
                            <a class='btn-link text-info' href='views/view_worker.php' style='text-decoration: none;'>Back</a>
                        </button>
                    </div>   
                </div>
            ";
        }
