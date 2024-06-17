<?php
$this->Title = 'Наші контакти';
?>
<h1 class="text-center">Наші контакти</h1>
<hr>
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header bg-primary text-white"><i class="bi bi-envelope"></i> Форма зворотнього зв'язку
            </div>
            <div class="card-body">
                <form method="post" action="" class="d-flex flex-column gap-2">
                    <div class="form-group">
                        <label for="name">Ім'я</label>
                        <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp"
                               placeholder="Введіть ваше ім'я" required="true">
                    </div>
                    <div class="form-group">
                        <label for="email">Ел.пошта</label>
                        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp"
                               placeholder="Введіть вашу ел.пошту" required="true">
                    </div>
                    <div class="form-group">
                        <label for="message">Повідомлення</label>
                        <textarea class="form-control" id="message" name="message" rows="6" required="true"></textarea>
                    </div>
                    <div class="mx-auto">
                        <button type="submit" class="btn btn-primary text-right">Надіслати</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-4">
        <div class="card bg-light mb-3">
            <div class="card-header bg-success text-white text-uppercase"><i class="bi bi-building"></i> Контактна
                інформація
            </div>
            <div class="card-body">
                <p>Київська, #</p>
                <p>10030 Житомир</p>
                <p>Україна</p>
                <p>Ел.пошта: museum@example.com</p>
                <p>Номер телефону: +380 99 99 99 999</p>
            </div>
        </div>
    </div>
</div>
