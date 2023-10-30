<?php

$db_config = require __DIR__ . "/config/database.php";
try {

    $connection = new PDO(
        "mysql:host={$db_config['host']};dbname={$db_config['db']};charset={$db_config['charset']}",
        $db_config['user'],
        $db_config['pass']

    );
} catch (PDOException $e) {
    throw new PDOException($e->getMessage(), (int)$e->getCode());
}
