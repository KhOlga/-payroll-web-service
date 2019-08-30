<?php
require "header.php";

?>

<br>
<section class="container">
    <h3>Edit payroll:</h3>
    <form action="#" class="form" method="post">
        <div class="form-group">
            <label for="worker_name">Worker name:</label>
            <input class="form-control" type="text" id="worker_name" id="search" name="search" placeholder="Worker Name" data-valid="required">
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
        </div>
        <div class="form-group">
            <label for="department_id">Department:</label>
            <input class="form-control" type="text" id="department_id" name="department_id" placeholder="Email" data-valid="required" data-email>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</section>
