<?php
include "../../bootstrap.php";
if(empty($_GET['id']) || !isset( $_GET['id'] )) {
    redirect('/student');
}

$page = isset($_GET['page']) ? $_GET['page'] : 1;
$perPage = 15;
$answerModel = new Answer();
$rows = $answerModel->get(
    ['*'],
    ['quiz_id' => $_GET['id']],
    '',
    $page,
    $perPage
);
$grades = [];
foreach ($rows as $row) {
    $grades[] = $row['grade'];
}
usort($grades, function ($a, $b) {
    $gradeA = explode(' / ', $a)[1];
    $gradeB = explode(' / ', $b)[1];

    return $gradeB <=> $gradeA;
});

$totalRows = count($answerModel->all());
$totalPages = ceil($totalRows / $perPage);

view('student/standings', [
    'answers' => $rows,
    'totalRows' => $totalRows,
    'totalPages' => $totalPages,
    'page' => $page,
    'grades' => $grades

]);
