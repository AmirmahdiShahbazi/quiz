<?php
include "../../bootstrap.php";

if(empty($_GET['id']) || !isset( $_GET['id'] )) {
    redirect('/student');
}

$page = isset($_GET['page']) ? $_GET['page'] : 1;
$perPage = 15;
$answerModel = new Answer();
$answers = $answerModel->get(['*'],['user_id'=>$_GET['id']], '', $page, $perPage);
$totalRows = count($answerModel->all());
$totalPages = ceil($totalRows / $perPage);

view('student/passed', [
    'answers'=>$answers,
    'totalRows' => $totalRows,
    'totalPages' => $totalPages,
    'page' => $page,
 

]);