<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Scherbakov Andrey">

    <title>Taskbook</title>

    <link href="<?= TaskBook\App::siteUrl() ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= TaskBook\App::siteUrl() ?>css/custom.css" rel="stylesheet">
</head>
<body>
<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">

    <h5 class="my-0 mr-md-auto font-weight-normal">Taskbook<?php if (TaskBook\App::isLogged()) { ?> Admin Panel<?php } ?></h5>
    <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-dark" href="<?= TaskBook\App::siteUrl() ?>list">Task List</a>
        <a class="p-2 text-dark" href="<?= TaskBook\App::siteUrl() ?>add">Add New</a>
    </nav>
    <?php if (TaskBook\App::isLogged()) { ?><a class="btn btn-outline-primary" href="<?= TaskBook\App::siteUrl() ?>admin/logout">Log Out</a><?php
    } else { ?><a class="btn btn-outline-primary" href="<?= TaskBook\App::siteUrl() ?>admin/login">Log In</a><?php } ?>
</div>

<div class="container">
    <div class="text-center">

        <?php if (TaskBook\App::hasFlash()) { ?>
            <div class="alert alert-<?= TaskBook\App::getFlashType() ?>" role="alert">
                <?= TaskBook\App::getFlash() ?>
            </div>
        <?php } ?>
<?= $content ?>
    </div>

    <footer class="my-5 pt-5 text-muted text-center text-small border-top">
        <p class="mb-1">&copy; 2018 <a href="http://beejee.org/">BeeJee</a></p>
    </footer>

</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="<?= TaskBook\App::siteUrl() ?>js/jquery-slim.min.js"><\/script>')</script>
<script src="<?= TaskBook\App::siteUrl() ?>js/bootstrap.min.js"></script>
<script src="<?= TaskBook\App::siteUrl() ?>js/form-validation.js"></script>
</body>
</html>