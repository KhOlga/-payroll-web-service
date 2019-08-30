<?php
require "header.php";

?>
<br>
<section>
    <div class="container">
        <h3>View worker's profile</h3>
        <form class="input-group mb-3" action="/action_view_worker.php" method="post" >
            <input class="form-control" type="text" id="search" name="search" placeholder="Please enter worker's name" data-valid="required">
            <div class="input-group-append">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </form>
        <br>
    </div>
</section>
