<?php
/** @var string $Title */

/** @var string $Content */

use models\Users;

if (empty($Title)) {
    $Title = 'ZTU-CMS';
}

if (empty($Content)) {
    $Content = '';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $Title ?></title>

    <link rel="stylesheet" href="/globals/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
</head>
<body>
<div class="container">
    <header class="d-flex flex-wrap justify-content-between py-3">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 link-body-emphasis text-decoration-none">
            <span class="fs-4">Museum</span>
        </a>

        <ul class="nav nav-pills">
            <li class="nav-item"><a href="/" class="nav-link" aria-current="page">Головна</a></li>
            <li class="nav-item"><a href="/about" class="nav-link">Про музей</a></li>
            <li class="nav-item"><a href="/galleries" class="nav-link">Галереї</a></li>
            <li class="nav-item"><a href="/events" class="nav-link">Події</a></li>
            <li class="nav-item"><a href="/posts" class="nav-link">Публікації</a></li>
            <li class="nav-item"><a href="/contact" class="nav-link">Контакти</a></li>
        </ul>
        <?php if (!Users::IsUserLogged()) : ?>
            <div class="text-end">
                <a href="/users/login">
                    <button type="button" class="btn btn-outline-dark me-2">Увійти</button>
                </a>
                <a href="/users/register">
                    <button type="button" class="btn btn-warning">Зареєструватися</button>
                </a>
            </div>
        <?php endif; ?>
        <?php if (Users::IsUserLogged()) : ?>
            <div class="mt-auto mb-auto">
                <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">Панель
                    управління</a>
                <ul class="dropdown-menu">

                    <?php if (Users::IsUserAdmin()) : ?>
                        <li><a class="dropdown-item" href="/admin/galleries">Галереї</a></li>
                        <li><a class="dropdown-item" href="/admin/events">Події</a></li>
                    <?php endif; ?>
                    <li><a class="dropdown-item" href="/admin/posts">Публікації</a></li>
                    <li><a class="dropdown-item" href="/users/logout">Вийти</a></li>
                </ul>
            </div>
        <?php endif; ?>
    </header>
</div>
<div class="container">
    <?= $Content ?>
</div>
<footer class="footer mt-auto py-3">
    <div class="container">
        <ul class="nav justify-content-center border-bottom pb-3 mb-3">
            <li class="nav-item"><a href="/" class="nav-link px-2 text-body-secondary">Головна</a></li>
            <li class="nav-item"><a href="/about" class="nav-link px-2 text-body-secondary">Про музей</a></li>
            <li class="nav-item"><a href="/galleries" class="nav-link px-2 text-body-secondary">Галереї</a></li>
            <li class="nav-item"><a href="/events" class="nav-link px-2 text-body-secondary">Події</a></li>
            <li class="nav-item"><a href="/contacts" class="nav-link px-2 text-body-secondary">Контакти</a></li>
        </ul>
        <p class="text-center text-body-secondary">© 2024 Museum</p>
    </div>
</footer>
</body>
</html>
