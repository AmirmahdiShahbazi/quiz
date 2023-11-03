<?php

include "../bootstrap.php";

$result = getQuizes(1);
view('quiz/index', ['quizes'=>$result['quizes'], 'totalRows'=>$result['totalRows'], 'page'=>$result['page'], 'totalPages'=>$result['totalPages']]);


function getQuizes($user_id){
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $perPage = 10;
    $quiz = new Quiz();
    $rows = $quiz->get(['*'], ['user_id'=>$user_id], "", $page, $perPage);
    $totalRows = count($quiz->all());
    $totalPages = ceil($totalRows / $perPage);

    return ['quizes'=>$rows, 'totalRows'=>$totalPages, 'totalPages'=>$totalPages, 'page'=>$page];


    
}

