<?php

function DB_connection(){
    $config = require 'database/db_config.php';

    $db_connection = new PDO(
        $config['database_dsn'],
        $config['database_user'],
        $config['database_pass']
    );
    return $db_connection;
}