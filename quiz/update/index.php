<?php
include "../../bootstrap.php";
if (!$_SERVER['REQUEST_METHOD'] == 'POST') {
    die('not allowed 405!');
}
if (!preg_match('/^[0-9]+$/', $_GET['id'])) {
    die('not found 404!');
}
validate();
try {
    $quiz_id = $_GET['id'];
    updateQuiz($quiz_id);
    updateQuestions($quiz_id);
    $_SESSION['success'] = 'آزمون با موفیت بروزرسانی شد';
    redirect('/quiz');
} catch (Exception $e) {
    $_SESSION['failed'] = $e->getMessage();
    redirect('/quiz/edit/index.php?id=' . $quiz_id);
}





function updateQuiz($qizId)
{
    $quizModel = new Quiz();
    return $quizModel->update([
        'title' => $_POST['title'],
        'rand_easy' => $_POST['rand_easy'],
        'rand_normal' => $_POST['rand_normal'],
        'rand_hard' => $_POST['rand_hard'],
        'question_count'=>intval($_POST['count']),
    ], ['id' => $qizId]);
}
function updateQuestions($quiz_id)
{
    $questions = generateQuestions($quiz_id);
    $questionModel = new Question();
    foreach ($questions as $question) {
        $questionModel->update($question, ['quiz_id' => $quiz_id]);
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
function validate()
{
    $editUrl = '/quiz/edit/?id='.$_GET['id'];
    $counts = array_count_values($_POST['level']);
    $hard_count = $counts['hard'] ?? 0;
    $easy_count = $counts['easy'] ?? 0;
    $normal_count = $counts['normal'] ?? 0;
    $count = intval($_POST['count']);



    if (intval($_POST['rand_easy']) > $easy_count) {
        $_SESSION['failed'] = 'تعداد سوالات تصادفی آسان نمیتواند بیشتر از تعداد سوالات آسان باشد';
        redirect($editUrl);
    }

    if (intval($_POST['rand_normal']) > $normal_count) {
        $_SESSION['failed'] = 'تعداد سوالات تصادفی متوسط نمیتواند بیشتر از تعداد سوالات متوسط باشد';
        redirect($editUrl);
    }
    if (intval($_POST['rand_hard']) > $hard_count) {
        $_SESSION['failed'] = 'تعداد سوالات تصادفی سخت نمیتواند بیشتر از تعداد سوالات سخت باشد';
        redirect($editUrl);
    }
}
