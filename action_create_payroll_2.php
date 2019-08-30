<?php
require "./views/header.php";
require_once "database/DB_connection.php";
require "TableRows.php";
require "Entity/Worker.php";
require "Entity/Department.php";
require "Entity/Product.php";

$worker_id = $_POST['worker_id'];
$product_id = $_POST['product_id'];
$products_amount = $_POST['products_amount'];

$worker = new Worker();
$name_worker = $worker->takeWorkerName($worker_id);
$name_worker = current($name_worker);

$department_id = $worker->takeDepartmentID($worker_id);
$department_id = current($department_id);

$department = new Department();
$department_name = $department->showDepartmentName($department_id);

$department_name = current($department_name);

$prod = new Product();
$price = $prod->showProductNetPrice($product_id);
$net_price = current($price);

$salary = $products_amount * $net_price * 0.15;

if($salary<=1500){
    $payroll = $salary . " $";
} else{
    $payroll = "1500 $";
}

echo "<br>";
?>
<section class="row">
    <div class="col-12">
    <div class="col-12 row container">
        <div class="col-3"></div>
        <div class="col-6">
            <h2><?php echo $name_worker . " "; ?>profile</h2>
            <table class="table table-bordered">
                <thead class="table-info">
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
                    <td><?php echo ($worker_id); ?></td>
                    <td><?php echo ($name_worker); ?></td>
                    <td><?php echo ($department_name); ?></td>
                    <td><?php echo ($products_amount); ?></td>
                    <td>
                        <button type="button" class="btn btn btn-link text-info" data-toggle="modal" data-target="#myModal">
                            <?php echo ($payroll) ; ?>
                        </button>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="col-3"></div>
        <div class="container mt-5">
            <div class="d-flex justify-content-center mb-3 jumbotron text-info">
                <?php
                $product = new Product();
                $product->createProducedProduct($product_id, $worker_id, $department_id);
                ?>
            </div>
        </div>
    </div>
</section>


<!-- MODAL -->
<div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title">Edit payroll</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <form method="post" action="modal.php">
                    <input class="form-control" type="text" id="search" name="search" placeholder="Please enter again worker's name" data-valid="required">
                    Enter your number: <input type="text" id="payroll" name="payroll" data-valid="required">
                    <button type="submit" class="btn btn-info" onclick="myFunction()">Submit</button>
                    <p id="demo"></p>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>

<script>
    function myFunction() {
        let x, text;
        x = document.getElementById("payroll").value;
        if (isNaN(x) || x < 1 || x > 1500) {
            text = "Input not valid";
        } else {
            text = "Input OK";
        }
        document.getElementById("demo").innerHTML = text;
    }
</script>