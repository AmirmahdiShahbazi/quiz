<?php partial('header') ?>
<!-- add-questions -->
<div class="container mt-3">
    <h2>ویرایش آزمون</h2>
    <?php partial('alerts')?>
    <hr class="mb-4" />
    <form  action="../../quiz/update/index.php?id=<?php echo $quiz['id'] ?>" method="post" class="">
        <div class="form-group">
            <h3>نام آزمون</h3>
            <input value="<?php echo $quiz['title']; ?>" type="text" required name="title" class="form-control">
        </div>
        <input name="count" type="hidden" value="<?php echo $quiz['question_count']?>">
        <hr>
        <h3>سوالات</h3>
        <?php $i = 1 ?>
        <?php foreach ($questions as $question) : ?>

            <h3>.<?php echo $i++ ?></h3>
            <div class="form-group">
                <label for="name">صورت سوال</label>
                <input type="text" value="<?php echo $question['question'] ?>" required class="form-control" id="question" name="question[]" placeholder="صورت سوال را وارد کنید">
            </div>
            <div class="form-group">
                <label for="options">گزینه ها</label>
                <div class="container" id="options">
                    <div class="row">
                        <div class="col-md">
                            <input type="text" value="<?php echo explode(',', $question['options'])[0] ?>" required class="form-control" name="a-options[]" id="a" placeholder="گزینه الف">
                        </div>
                        <div class="col-md">

                            <input type="text" value="<?php echo explode(',', $question['options'])[1] ?>" required class="form-control" name="b-options[]" id="b" placeholder="گزینه ب">
                        </div>
                        <div class="col-md">

                            <input type="text" value="<?php echo explode(',', $question['options'])[2] ?>" required class="form-control" name="c-options[]" id="c" placeholder="گزینه ج">
                        </div>
                        <div class="col-md">

                            <input type="text" value="<?php echo explode(',', $question['options'])[3] ?>" required class="form-control" name="d-options[]" id="d" placeholder="گزینه د">
                        </div>
                    </div>
                </div>


            </div>

            <label for="level">پاسخ صحیح</label>
            <div class="form-group  py-2">
                <select class="form-control" name="correct[]" id="level">
                    <option <?php echo $question['correct'] == 'a' ? 'selected' : '' ?> value="a">الف</option>
                    <option <?php echo $question['correct'] == 'b' ? 'selected' : '' ?> value="b">ب</option>
                    <option <?php echo $question['correct'] == 'c' ? 'selected' : '' ?> value="c">ج</option>
                    <option <?php echo $question['correct'] == 'd' ? 'selected' : '' ?> value="d">د</option>


                </select>
            </div>


            <label for="level">سطح سوال</label>
            <div class="form-group  py-2">
                <select class="form-control" name="level[]" id="level">
                    <option <?php echo $question['level'] == 'easy' ? 'selected' : '' ?> value="easy">آسان</option>
                    <option <?php echo $question['level'] == 'normal' ? 'selected' : '' ?> value="normal">متوسط</option>
                    <option <?php echo $question['level'] == 'hard' ? 'selected' : '' ?> value="hard">سخت</option>

                </select>
            </div>
            <hr class="my-3" />
            



        <?php endforeach; ?>

        <div class="form-group">

<div class="row">
    <div class="col">
        <label for="rand-easy">تعداد سوالات تصادفی آسان </label>
        <input type="number" value="<?php echo $quiz['rand_easy'] ?>" required name="rand_easy" id="rand-easy" class="form-control">
    </div>
    <div class="col">
        <label for="rand-normal"> تعداد سوالات تصادفی متوسط</label>

        <input value="<?php echo $quiz['rand_normal'] ?>" type="number" required name="rand_normal" id="rand-normal" class="form-control">
    </div>
    <div class="col">
        <label for="rand-hard">تعداد سوالات تصادفی سخت</label>

        <input value="<?php echo $quiz['rand_hard'] ?>" type="number" required name="rand_hard" id="rand-hard" class="form-control">
    </div>
</div>
</div>


        <button type="submit" class="btn btn-primary">بروزرسانی</button>

    </form>



</div>


<?php partial('footer') ?>