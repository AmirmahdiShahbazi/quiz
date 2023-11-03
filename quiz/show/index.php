<?php
include '../../bootstrap.php';
if (!preg_match('/^[0-9]+$/', $_GET['id'])) {
    die('not found 404!');
} 
$quiz = new Quiz();
$currentQuiz = $quiz->find($_GET['id']);
$questions = new Question();
$questions = $questions->get(['*'], ['quiz_id' => $currentQuiz['id']]);
view('quiz/show', ['questions'=>$questions,'quiz'=>$currentQuiz]);