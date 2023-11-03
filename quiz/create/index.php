<?php
include "../../bootstrap.php";

$request = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];
if (!$request == '/create') {
    die("404 not found");
}
if ($method == "GET") {
    include __DIR__ . "/../../views/quiz/create.php";
}
if ($method == 'POST') {
    validate();
    try {
        $createdQuiz = createQuiz(1);
        $questions = generateQuestions($createdQuiz);
        createQuestions($questions);
        $_SESSION['success'] = 'آزمون با موفقیت ساخته شد';
        redirect('/quiz');
    } catch (Exception $e) {
        $_SESSION['failed'] = $e->getMessage();
        redirect('/quiz');
    }
}



function createQuestions($questions)
{
    $questionModel = new Question();
    foreach ($questions as $question) {
        $questionModel->create($question);
    }
}

function generateQuestions($quizId)
{
    $questions = [];

    for ($i = 0; $i < count($_POST['question']); $i++) {

        $question = [
            'question' => $_POST['question'][$i],
            'options' => $_POST['a-options'][$i] . ',' . $_POST['b-options'][$i] . ',' . $_POST['c-options'][$i] . ',' . $_POST['d-options'][$i],
            'level' => $_POST['level'][$i],
            'correct' => $_POST['correct'][$i],
            'quiz_id' => $quizId,

        ];


        $questions[] = $question;
    }
    return $questions;
}

function createQuiz($userId)
{
    $quizModel = new Quiz();
    return $quizModel->create([
        'title' => $_POST['title'],
        'user_id' => $userId,
        'rand_easy' => $_POST['rand_easy'],
        'rand_normal' => $_POST['rand_normal'],
        'rand_hard' => $_POST['rand_hard'],
        'question_count' => $_POST['count']+1 ?? 1
    ]);
}

function validate()
{
    $counts = array_count_values($_POST['level']);
    $hard_count = $counts['hard'] ?? 0;
    $easy_count = $counts['easy'] ?? 0;
    $normal_count = $counts['normal'] ?? 0;
    $count = $_POST['count']+1 ?? 1 ;


    if (intval($_POST['rand_easy']) > $easy_count) {
        $_SESSION['failed'] = 'تعداد سوالات تصادفی آسان نمیتواند بیشتر از تعداد سوالات آسان باشد';
        redirect('/quiz/create');
    }

    if (intval($_POST['rand_normal']) > $normal_count) {
        $_SESSION['failed'] = 'تعداد سوالات تصادفی متوسط نمیتواند بیشتر از تعداد سوالات متوسط باشد';
        redirect('/quiz/create');
    }
    if (intval($_POST['rand_hard']) > $hard_count) {
        $_SESSION['failed'] = 'تعداد سوالات تصادفی سخت نمیتواند بیشتر از تعداد سوالات سخت باشد';
        redirect('/quiz/create');
    }
}
