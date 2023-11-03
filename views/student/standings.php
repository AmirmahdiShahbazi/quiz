<?php partial('header') ?>
<div class="container">
    <?php partial('alerts') ?>
    <?php $userModel = new User() ?>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">نام</th>
                <th scope="col">نمره</th>

            </tr>
        </thead>
        <tbody>
            <?php $i=0?>
            <?php foreach ($answers as $answer) : ?>
                <tr>
                    <td><?php echo $userModel->find($answer['user_id'])['name'] ?></td>
                    <td><?php echo $grades[$i]; $i++;  ?></td>
                </tr>

            <?php endforeach; ?>


        </tbody>
    </table>

    <nav class="text-center">
        <ul class="pagination justify-content-center" style="direction: ltr;">
            <?php for ($i = 1; $i <= $totalPages; $i++) : ?>


                <li class="page-item <?php echo ($i == $page) ? 'active' : ''; ?>">
                    <a class="page-link" href="?id=<?php echo $_GET['id']?>&page=<?php echo $i; ?>"><?php echo $i; ?></a>
                </li>
            <?php endfor; ?>
        </ul>
    </nav>
</div>
<?php partial('footer') ?>