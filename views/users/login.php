<?php
/** @var string $error_message Error message */
$this->Title = 'Login';
?>
<div class="container-form">
    <form method="post" action="">
        <?php if (!empty($error_message)) : ?>
            <div class="alert alert-danger" role="alert">
                <?= $error_message ?>
            </div>
        <?php endif; ?>
        <div class="mb-3">
            <label for="inputEmail" class="form-label">Ел.пошта</label>
            <input type="email" class="form-control" name="email" id="inputEmail" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="inputPassword" class="form-label">Пароль</label>
            <input type="password" class="form-control" name="password" id="inputPassword">
        </div>
        <button type="submit" class="btn btn-primary">Увійти</button>
    </form>
</div>
