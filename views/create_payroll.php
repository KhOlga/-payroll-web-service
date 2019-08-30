<?php
require "header.php";

?>

<br>
<section class="container">
    <h3>Set salary:</h3>
    <form method="post" action="/action_create_payroll_1.php" class="form">
        <div class="form-group">
            <label for="department_id">Department:</label>
            <select class="form-control" id="department_id" name="department_id" data-valid="required">
                <option selected>Please choose department</option>
                <option value="1">Mobiles phones</option>
                <option value="2">TV-sets</option>
                <option value="3">Computers</option>
            </select>
            <button type="submit" class="btn btn-info">Next</button>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
        </div>
    </form>
</section>


