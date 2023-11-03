<?php
session_start();
define("BASE_DIR",__DIR__);
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
include __DIR__."/classes/Model.php";
include __DIR__."/classes/Question.php";
include __DIR__."/classes/Quiz.php";
include __DIR__."/classes/Answer.php";
include __DIR__."/classes/User.php";
include __DIR__."/helpers.php";


