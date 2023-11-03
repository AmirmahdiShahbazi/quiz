<?php partial('header') ?>
<?php $quizModel = new Quiz() ?>
<div class="container">
    <?php partial('alerts') ?>
    <!-- pass the user id here -->

    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">آزمون</th>
                <th scope="col">نمره</th>
                <th scope="col">عملیات</th>

            </tr>
        </thead>
        <tbody>

            <?php foreach ($answers as $answer) : ?>
                <tr>
                    <td><?php echo $quizModel->find($answer['quiz_id'])['title'] ?></td>
                    <td><?php echo $answer['grade'] ?></td>
                    <td>
                        <a href="/student/correct/index.php?id=<?php echo $answer['quiz_id'] ?>" class="btn btn-primary text-white">مشاهده پاسخ های صحیح</a>
                    </td>
                </tr>
            <?php endforeach; ?>


        </tbody>
    </table>

    <nav class="text-center">
        <ul class="pagination justify-content-center" style="direction: ltr;">
            <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
                <li class="page-item <?php echo ($i == $page) ? 'active' : ''; ?>">
                    <a class="page-link" href="<?php echo '?id=' . $_GET['id'] ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a>
                </li>
            <?php endfor; ?>
        </ul>
    </nav>
</div>
<?php partial('footer') ?>