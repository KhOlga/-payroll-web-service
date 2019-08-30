<?php
require "./views/header.php";
require_once "database/DB_connection.php";
require "TableRows.php";
require "Entity/Worker.php";
require "Entity/Department.php";

$department_id = $_POST['department_id'];
$array = array();
if ($department_id == 1 || $department_id == 2 || $department_id == 3){
    //створюємо об'єкт класа Worker
    $new_worker = new Worker();
    //отримуємо ID всіх працівників обраного відділу
    $result = $new_worker->iDWorkersInDepartment($department_id);
    //об'являємо масиви для подальшого збереження даних

    $arrayKey = array();
    $arrayValue = array();
    //перебираємо масив з ID всіх працівників конкретного відділу
    foreach ($result as $key => $value){
        //заповнюємо масив ключів
        array_push($arrayKey, $value);
        //витягуємо імена працівників з бази даних та заповнюємо масив імен
        $nw = new Worker();
        $nameWorker = $nw->showWorkerNames($value);
        $name = $nameWorker['worker_name'];
        array_push($arrayValue, $name);
    }
    $array = array_combine ($arrayKey, $arrayValue);

} else {
    echo "
        <div class='container mt-5'>
            <div class='d-flex justify-content-center mb-3 jumbotron text-info'>
               <div> Please choose department! </div>
            </div>
            <div>
                <button type='button' class='btn btn-outline-info'>
                    <a class='btn-link text-info' href='views/create_payroll.php' style='text-decoration: none;'>Back</a>
                </button>
            </div>   
        </div>
    ";
}

?>
<section class="container">
    <form method="post" action="/action_create_payroll_2.php" class="form">
        <div class="form-group mb-3">

            <label for="worker_name"><h5>Worker name:</h5></label>
            <select class="form-control" id="worker_id" name="worker_id" data-valid="required">
                <option selected>Please choose worker name</option>
                    <?php
                        foreach ($array as $key=>$value){
                            echo "<option value='$key'>$value</option>";
                        }
                    ?>
            </select>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>

            <label for="department_id"><h5>Products:</h5></label>
            <select class="form-control" id="product_id" name="product_id" data-valid="required">
                <option selected>Please choose product</option>
                <option value="1">Mobile phone</option>
                <option value="2">TV-set</option>
                <option value="3">Computer</option>
            </select>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>

            <label for="worker_name"><h5>Please enter amount of produced products:</h5></label>
            <input class="form-control" type="text" id="products_amount" name="products_amount" placeholder="Amount of produced products" data-valid="required">
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>

            <button type="submit" class="btn btn-info">Submit</button>
        </div>
    </form>
</section>