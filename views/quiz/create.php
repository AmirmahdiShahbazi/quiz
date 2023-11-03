<?php partial('header')?>

    <!-- add-questions -->
    <div class="container mt-3">
    
        <h2>ایجاد آزمون</h2>
        <hr class="mb-4" />
        <?php partial('alerts')?>
        <form id="quiz" action="../../quiz/create/index.php" method="post" class="">
        <div class="form-group">
            <h3>نام آزمون</h3>
            <input type="text" required name="title" class="form-control">
        </div>    
        <hr>
        <h3>سوالات</h3>
        <h3>1.</h3>
            <div class="form-group">
                <label for="name">صورت سوال</label>
                <input type="text" required class="form-control" id="question" name="question[]" placeholder="صورت سوال را وارد کنید">
            </div>
            <div class="form-group">
                <label for="options">گزینه ها</label>
                <div class="container" id="options">
                    <div class="row">
                        <div class="col-md">
                            <input type="text" required class="form-control" name="a-options[]" id="a" placeholder="گزینه الف">
                        </div>
                        <div class="col-md">

                            <input type="text" required class="form-control" name="b-options[]" id="b" placeholder="گزینه ب">
                        </div>
                        <div class="col-md">

                            <input type="text" required class="form-control" name="c-options[]" id="c" placeholder="گزینه ج">
                        </div>
                        <div class="col-md">

                            <input type="text" required class="form-control" name="d-options[]" id="d" placeholder="گزینه د">
                        </div>
                    </div>
                </div>


            </div>

            <label for="level">پاسخ صحیح</label>
            <div class="form-group  py-2">
                <select class="form-control" name="correct[]" id="level">
                    <option value="a">الف</option>
                    <option value="b">ب</option>
                    <option value="c">ج</option>
                    <option value="d">د</option>


                </select>
            </div>


            <label for="level">سطح سوال</label>
            <div class="form-group  py-2">
                <select class="form-control" name="level[]" id="level">
                    <option value="easy">آسان</option>
                    <option value="normal">متوسط</option>
                    <option value="hard">سخت</option>

                </select>
            </div>

            <hr class="my-4" />
            <div id="additionalQuestions"></div>

            <span for="number">اضافه کردن
                <input type="number"   class="" style="max-width: 5%;" id="number"> سوال
                <button type="button" class="btn btn-primary mr-3" onclick="additionalQuestions()">اضافه کردن</button>
            </span>

            <hr class="my-3" />

            <div class="form-group">

                <div class="row">
                    <div class="col">
                        <label for="rand-easy">تعداد سوالات تصادفی آسان </label>
                        <input type="number" required name="rand_easy"  id="rand-easy" class="form-control">
                    </div>
                    <div class="col">
                        <label for="rand-normal"> تعداد سوالات تصادفی متوسط</label>

                        <input type="number" required name="rand_normal" id="rand-normal" class="form-control">
                    </div>
                    <div class="col">
                        <label for="rand-hard">تعداد سوالات تصادفی سخت</label>

                        <input type="number" required name="rand_hard" id="rand-hard" class="form-control">
                    </div>
                </div>
            </div>


            <button type="submit" class="btn btn-primary">ساخت آزمون</button>

        </form>



    </div>


<?php partial('footer')?>


 