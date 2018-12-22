<div class="table-responsive">
          <table class="table">
          <thead>
          <tr>
            <th><a href="<?= TaskBook\App::siteUrl() ?>list/<?= $this->model->getSortLink('username') ?>">Username</a></th>
            <th><a href="<?= TaskBook\App::siteUrl() ?>list/<?= $this->model->getSortLink('email') ?>">E-mail</a></th>
            <th>Task Body</th>
            <th><a href="<?= TaskBook\App::siteUrl() ?>list/<?= $this->model->getSortLink('status') ?>">Status</a></th>
            <?php if (TaskBook\App::isLogged()) { ?>
                <th>Actions</th>
            <?php } ?>

          </tr>
          </thead>
          <tbody>
          <?php foreach ($this->model->all() as $task) { ?>

            <tr>
                <td><?= $task['username'] ?></td>
                <td><?= $task['email'] ?></td>
                <td class="text-justify"><?= $task['text'] ?></td>
                <td><?= $task['statusText'] ?></td>
                <?php if (TaskBook\App::isLogged()) { ?>
                    <td><a href="<?= TaskBook\App::siteUrl() ?>edit/<?= $task['id'] ?>">Edit</a></td>
                <?php } ?>

            </tr>
        <?php } ?>

        </tbody>
    </table>

</div>

<nav aria-label="Page navigation example">
    <?= $this->getPagination() ?>
</nav>