<?php
require "header.php";

?>

<br>
<section class="container">
    <h3>Add new worker:</h3>
    <form action="/action_create_worker.php" class="form" method="post">
        <div class="form-group">
            <label for="worker_name">Please enter worker name:</label>
            <input class="form-control" type="text" id="worker_name" name="worker_name" placeholder="Worker Name" data-valid="required">
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
        </div>
        <div class="form-group">
            <label for="department_id">Department:</label>
            <select class="form-control" id="department_id" name="department_id" data-valid="required">
                <option selected>Please choose department</option>
                <option value="1">Mobiles phones</option>
                <option value="2">TV-sets</option>
                <option value="3">Computers</option>
            </select>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</section>
