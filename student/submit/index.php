<?php
include "../../bootstrap.php";

if(!$_SERVER['REQUEST_METHOD'] == 'POST')
{
    die('not allowed 405!');
}

$questions = [];
$questionModel = new Question();
$corrects = 0;
foreach(array_keys($_POST) as $id)
{
    $question = $questionModel->find(intval($id));
    $quiz_id = $question['quiz_id'];
    if($question['correct']==$_POST[$id]) $corrects++;
}
$grade =count(array_keys($_POST)) . " / ". $corrects ;
createAnswer(1, $grade, $quiz_id);
echo json_encode(['status'=>'success', 'grade'=>$grade], JSON_UNESCAPED_SLASHES);



function createAnswer($user_id, $grade, $quiz_id)
{
    $answerModel = new Answer();
    $answerModel->create(['user_id'=>$user_id, 'quiz_id'=>$quiz_id, 'grade'=>$grade]);


}