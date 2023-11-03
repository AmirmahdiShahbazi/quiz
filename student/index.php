<?php
include '../bootstrap.php';

$result = getQuizes();

view('student/index', [
    'quizes' => $result['quizes'],
    'totalRows' => $result['totalRows'],
    'totalPages' => $result['totalPages'],
    'page'=>$result['page']
]);




function getQuizes()
{
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $perPage = 15;
    $quiz = new Quiz();
    $rows = $quiz->get(['*'], [], "", $page, $perPage);
    $totalRows = count($quiz->all());
    $totalPages = ceil($totalRows / $perPage);

    return ['quizes' => $rows, 'totalRows' => $totalPages, 'totalPages' => $totalPages, 'page'=>$page];
}
