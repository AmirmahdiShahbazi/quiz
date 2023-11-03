<?php partial('header') ?>
<div class="container">
    <?php partial('alerts') ?>
    <!-- pass the user id here -->
    <a href="/student/passed?id=1" class="btn btn-primary my-3">مشاهده آزمون های گذرانده شده</a>

    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">آزمون</th>
                <th scope="col">تعداد سوال</th>
                <th scope="col">عملیات</th>
                <th scope="col">جدول رده بندی</th>

            </tr>
        </thead>
        <tbody>
            <tr>
                <?php foreach ($quizes as $quiz) : ?>
                    <td><?php echo $quiz['title'] ?></td>
                    <td><?php echo $quiz['rand_easy'] + $quiz['rand_hard'] + $quiz['rand_normal'] ?></td>
                    <td>
                        <a href="/student/quiz/index.php?id=<?php echo $quiz['id'] ?>" class="btn btn-primary text-white">شرکت در آزمون</a>
                    </td>
                    <td>
                        <a href="/student/standings/index.php?id=<?php echo $quiz['id'] ?>" class="btn btn-primary text-white">مشاهده جدول رده بندی</a>
                    </td>
                <?php endforeach; ?>
            </tr>


        </tbody>
    </table>

    <nav class="text-center">
        <ul class="pagination justify-content-center" style="direction: ltr;">
            <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
                <li class="page-item <?php echo ($i == $page) ? 'active' : ''; ?>">
                    <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                </li>
            <?php endfor; ?>
        </ul>
    </nav>
</div>
<?php partial('footer') ?>