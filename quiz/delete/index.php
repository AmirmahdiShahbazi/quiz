<?php
include '../../bootstrap.php';
if (!preg_match('/^[0-9]+$/', $_GET['id'])) {
    die('not found 404!');
} 
$quiz = new Quiz();
$quiz->delete($_GET['id']);
$_SESSION['success'] = 'آزمون با موفقیت حذف شد';
redirect('/quiz');
