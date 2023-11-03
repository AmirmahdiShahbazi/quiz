<?php partial('header') ?>
<div class="container">
    <a href="/quiz/create" class="btn btn-primary my-4">افزودن آزمون</a>
    <?php partial('alerts')?>

    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">آزمون</th>
                <th scope="col">تعداد سوال</th>
                <th scope="col">تعداد سوالات تصادفی</th>
                <th scope="col">عملیات</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($quizes as $quiz) : ?>
                <tr>
                    <th scope="row"><?php echo $quiz['id'] ?></th>
                    <td><?php echo $quiz['title'] ?></td>
                    <td><?php echo $quiz['question_count'] ?></td>
                    <td><?php echo $quiz['rand_easy'] + $quiz['rand_normal'] + $quiz['rand_hard'] ?></td>
                    <td>
                        <span>

                            <a href="<?php echo '/quiz/edit/index.php?id=' . $quiz['id'] ?>" title="ویرایش" class="link-primary">
                                <i class="far fa-edit"></i>
                            </a>

                            <a href="<?php echo '/quiz/delete/index.php?id=' . $quiz['id'] ?>" title="حذف" class="mr-1">
                                <i class="fas fa-trash-alt text-danger"></i>
                            </a>

                            <a href="<?php echo '/quiz/show/index.php?id=' . $quiz['id'] ?>" title="مشاهده">
                                <i class="far fa-eye"></i>
                            </a>
                        </span>

                    </td>
                </tr>
            <?php endforeach; ?>


        </tbody>
    </table>
    <nav class="text-center">
        <ul class="pagination justify-content-center" style="direction: ltr;">
            <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
                <li  class="page-item <?php echo ($i == $page) ? 'active' : ''; ?>">
                    <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                </li>
            <?php endfor; ?>
        </ul>
    </nav>
</div>
<?php partial('footer') ?>