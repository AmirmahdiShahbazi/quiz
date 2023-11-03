<?php
include "../../bootstrap.php";



$quiz = getQuiz();
$questions = [];
$generateQuestions = generateQuestions($quiz['rand_easy'], $quiz['rand_normal'], $quiz['rand_hard'], $_GET['id']);
foreach ($generateQuestions as $levels) {
    foreach ($levels as $question) {
        $questions[] = $question;
    }
}
view('student/correct', ['questions' => $questions, 'quiz' => $quiz]);












function generateQuestions($rand_easy, $rand_normal, $rand_hard, $quizId)
{

    $questionModel = new Question();
    $easy = $questionModel->select(['quiz_id' => $quizId, 'level' => 'easy'], 'RAND()', $rand_easy);
    $normal = $questionModel->select(['quiz_id' => $quizId, 'level' => 'normal'], 'RAND()', $rand_normal);
    $hard = $questionModel->select(['quiz_id' => $quizId, 'level' => 'hard'], 'RAND()', $rand_hard);
    return ['easy' => $easy, 'normal' => $normal, 'hard' => $hard];
}
function getQuiz()
{
    $quizModel = new Quiz();
    return $quizModel->find($_GET['id']);
}
