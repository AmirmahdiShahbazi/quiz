<?php
include "../../bootstrap.php";



$quiz = getQuiz();
is_passed(1, $quiz['id']);
$questions = [];
$generateQuestions = generateQuestions($quiz['rand_easy'], $quiz['rand_normal'], $quiz['rand_hard'], $_GET['id']);
foreach ($generateQuestions as $levels) {
    foreach ($levels as $question) {
        $questions[] = $question;
    }
}
view('student/quiz', ['questions' => $questions, 'quiz' => $quiz]);










function is_passed($user_id, $quiz_id)
{
    $answerModel = new Answer();
    $answer = $answerModel->select(['user_id' => $user_id, 'quiz_id' => $quiz_id]);    
    if (!empty($answer)) {
        $_SESSION['failed'] = 'شما قبلا این آزمون را گذرانده اید';
        redirect('/student');
    }
    return;
}

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
