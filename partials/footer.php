
</body>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="script.js"></script>
<script>
var totalForms = 0;

function additionalQuestions() {
    var number = document.getElementById('number').value;
    var additionalQuestions = document.getElementById('additionalQuestions');
    
    for (var i = 0; i < number; i++) {
        totalForms++;
        
        var newContent = `
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
                            <input type="text" required class="form-control" name="a-options[]"  id="a" placeholder="گزینه الف">
                        </div>
                        <div class="col-md">
                            <input type="text" required class="form-control" name="b-options[]" id="b" placeholder="گزینه ب">
                        </div>
                        <div class="col-md">
                            <input type="text" required class="form-control" name="c-options[]" id="c" placeholder="گزینه ج">
                        </div>
                        <div class="col-md">
                            <input type="text" required class="form-control" name="d-options[]" id="d"  placeholder="گزینه د">
                        </div>
                    </div>
                </div>
            </div>
            <label for="level${i+1}">پاسخ صحیح</label>
            <div class="form-group  py-2">
                <select class="form-control" name="correct[]" id="level${i+1}">
                    <option value="a">الف</option>
                    <option value="b">ب</option>
                    <option value="c">ج</option>
                    <option value="d">د</option>
                </select>
            </div>
            <label for="level${i+1}">سطح سوال</label>
            <div class="form-group py-2" id="level${i+1}">
                <select class="form-control" name="level[]" id="level">
                    <option value="easy">آسان</option>
                    <option value="normal">متوسط</option>
                    <option value="hard">سخت</option>
                </select>
            </div>
            <input type="hidden" name="count" value="${totalForms}"/>
            <hr class="my-4"/>
        `;
        
        additionalQuestions.insertAdjacentHTML('beforeend', newContent);
    }
}
</script>
<script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        $('#quizForm').submit(function(e) {
            e.preventDefault(); // Prevent the default form submission

            var formData = $(this).serialize(); // Serialize the form data

            $.ajax({
                url: $(this).attr('action'), // URL to submit the form
                type: $(this).attr('method'), // HTTP method
                data: formData, // Form data
                dataType: 'json', // specify the dataType
                success: function(response) {
                    // Handle the success response
                    console.log(response);
                    $('#myModal').modal('show');
                    $('#grade').text(' آزمون شما با موفقیت ثبت شد . نمره: ' + response.grade);
                },
                error: function(xhr, status, error) {
                    // Handle the error response
                    console.log(xhr.responseText);
                }
            });
        });
    });
</script>
</html>