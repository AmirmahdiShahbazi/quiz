<!DOCTYPE html>
<html>

<head>
    <title>ایجاد آزمون</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style>
        * {
            direction: rtl;
            text-align: right;
        }

        body {
            margin-bottom: 300px;
        }
    </style>
</head>

<body>
    <!-- add-questions -->
    <div class="container mt-3">
        <h2>ایجاد آزمون</h2>
        <form id="quiz" class="">
            <h3>1.</h3>
            <div class="form-group">
                <label for="name">صورت سوال</label>
                <input type="text" class="form-control" id="question" name="question[]" placeholder="صورت سوال را وارد کنید">
            </div>
            <div class="form-group">
                <label for="options">گزینه ها</label>
                <div class="container" id="options">
                    <div class="row">
                        <div class="col-md">
                            <input type="email" class="form-control" name="a-options[]" id="a" placeholder="گزینه الف">
                        </div>
                        <div class="col-md">

                            <input type="email" class="form-control" name="b-options[]" id="b" placeholder="گزینه ب">
                        </div>
                        <div class="col-md">

                            <input type="email" class="form-control" name="c-options[]" id="c" placeholder="گزینه ج">
                        </div>
                        <div class="col-md">

                            <input type="email" class="form-control" name="d-options[]" id="d" placeholder="گزینه د">
                        </div>
                    </div>
                </div>


            </div>


            <label for="level">سطح سوال</label>
            <div class="form-group border py-3">
                <div class="form-check form-check-inline" id="level">
                    <input class="form-check-input" name=easy[] type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                    <label class="form-check-label mr-1" for="exampleRadios1">
                        آسان
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" name=medium[] type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                    <label class="form-check-label mr-1" for="exampleRadios2">
                        متوسط
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" name=hard[] type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                    <label class="form-check-label mr-1" for="exampleRadios2">
                        سخت
                    </label>
                </div>
            </div>

            <hr class="my-4"/>
            <div id="additionalQuizes"></div>

            <span for="number">اضافه کردن
                <input type="number" class="" style="max-width: 5%;" id="number"> سوال
                <button type="button" class="btn btn-primary mr-3" onclick="additionalQuizes()">اضافه کردن</button>
            </span>
            
            <hr class="my-3"/>

            <div class="form-group">

                <div class="row">
                    <div class="col">
                        <label for="rand-easy">تعداد سوالات تصادفی آسان </label>
                        <input type="number" id="rand-easy" class="form-control">
                    </div>
                    <div class="col">
                        <label for="rand-normal"> تعداد سوالات تصادفی متوسط</label>

                        <input type="number" id="rand-normal" class="form-control">
                    </div>
                    <div class="col">
                        <label for="rand-hard">تعداد سوالات تصادفی سخت</label>

                        <input type="number" id="rand-hard" class="form-control">
                    </div>
                </div>
            </div>


        <button type="submit" class="btn btn-primary">ساخت آزمون</button>

        </form>



    </div>





    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="script.js"></script>
</body>
<script>
    var totalForms = 0;

    function additionalQuizes() {
        var number = document.getElementById('number').value;
        var additionalQuizes = document.getElementById('additionalQuizes');
        for (var i = 0; i < number; i++) {
            totalForms++;
            additionalQuizes.innerHTML += `
            
            <div class="form-group">
                <h3>${totalForms+1}.</h3>
                <label for="name${i+1}">صورت سوال</label>
                <input type="text" class="form-control" id="question${i+1}" name="question[]" placeholder="صورت سوال را وارد کنید">
            </div>
            <div class="form-group">
                <label for="options${i+1}">گزینه ها</label>
                <div class="container" id="options${i+1}">
                    <div class="row">
                        <div class="col-md">
                            <input type="email" class="form-control" name="a-options[]"  id="a" placeholder="گزینه الف">
                        </div>
                        <div class="col-md">

                            <input type="email" class="form-control" name="b-options[]" id="b" placeholder="گزینه ب">
                        </div>
                        <div class="col-md">

                            <input type="email" class="form-control" name="c-options[]" id="c" placeholder="گزینه ج">
                        </div>
                        <div class="col-md">

                            <input type="email" class="form-control" name="d-options[]" id="d"  placeholder="گزینه د">
                        </div>
                    </div>
                </div>


            </div>


            <label for="level${i+1}">سطح سوال</label>
            <div class="form-group border py-3" id="level${i+1}">
                <div class="form-check form-check-inline" id="level">
                    <input class="form-check-input" name=easy[] type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                    <label class="form-check-label mr-1" for="exampleRadios1">
                        آسان
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" name=medium[] type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                    <label class="form-check-label mr-1" for="exampleRadios2">
                        متوسط
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" name=hard[] type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                    <label class="form-check-label mr-1" for="exampleRadios2">
                        سخت
                    </label>
                </div>
            </div>





        <hr class="my-4"/>

        `;
        }
    }
</script>

</html>