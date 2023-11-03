<?php partial('header') ?>
<div class="container">
    <h2 class="my-3">آزمون <?php echo $quiz['title'] ?></h2>
    <hr>
    <form id="quizForm" action="../../student/submit/index.php" method="post">
        <?php foreach ($questions as $question) : ?>

            <?php $options = explode(',', $question['options']) ?>
            <div class="form-group">
                <p class="h5"><?php echo $question['question'] ?></p>
                <div class="form-check ">
                    <input disabled class="form-check-input" <?php echo $question['correct']=="a"?'checked':'' ?> type="radio" value="a" name="<?php echo $question['id'] ?>" id="option1">
                    <label class="form-check-label  mr-3 h6" for="option1">الف) <?php echo $options[0] ?></label>
                </div>
                <div class="form-check ">
                    <input disabled class="form-check-input" <?php echo $question['correct']=="b"?'checked':'' ?> value="b" type="radio" name="<?php echo $question['id'] ?>" id="option2">
                    <label class="form-check-label mr-3 h6" for="option2">ب) <?php echo $options[1] ?></label>
                </div>
                <div class="form-check ">
                    <input disabled class="form-check-input" <?php echo $question['correct']=="c"?'checked':'' ?> type="radio" value="c" name="<?php echo $question['id'] ?>" id="option3">
                    <label class="form-check-label mr-3 h6" for="option3">ج) <?php echo $options[2] ?></label>
                </div>
                <div class="form-check ">
                    <input disabled class="form-check-input" <?php echo $question['correct']=="d"?'checked':'' ?> type="radio" value="d" name="<?php echo $question['id'] ?>" id="option4">
                    <label class="form-check-label mr-3 h6" for="option4">د) <?php echo $options[3] ?></label>
                </div>
            </div>
            <hr>
        <?php endforeach; ?>
    </form>




</div>

<?php partial('footer') ?>