<?php
/** @var string $error_message Error message */
$this->Title = 'Реєстрація нового користувача';
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
            <input value="<?= $this->controller->post->email ?>" type="email" class="form-control" name="email"
                   id="inputEmail"
                   aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="inputPassword" class="form-label">Пароль</label>
            <input type="password" class="form-control" name="password" id="inputPassword">
        </div>
        <div class="mb-3">
            <label for="repeatPassword" class="form-label">Повторіть пароль</label>
            <input type="password" class="form-control" name="repeat_password" id="repeatPassword">
        </div>
        <div class="mb-3">
            <label for="inputFirstname" class="form-label">Ім'я</label>
            <input value="<?= $this->controller->post->name ?>" type="text" class="form-control" name="name"
                   id="inputFirstname">
        </div>
        <div class="mb-3">
            <label for="inputLastname" class="form-label">Прізвище</label>
            <input value="<?= $this->controller->post->surname ?>" type="text" class="form-control" name="surname"
                   id="inputLastname">
        </div>
        <button type="submit" class="btn btn-primary">Зареєструватися</button>
    </form>
</div>