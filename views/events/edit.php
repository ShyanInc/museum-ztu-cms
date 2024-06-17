<?php

/** @var object $event */

$this->Title = 'Редагування події';

$filePath = $event['image'];
$rootPath = \core\Core::getInstance()->rootDirPath;
if ($filePath == null || !is_file($rootPath . $filePath)) {
    $filePath = '/globals/images/event.png';
}
?>

<h1 class="text-center mt-1">Редагування галереї</h1>
<form id="event" method="post" action="" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="title">Заголовок</label>
        <input value="<?= $event['title'] ?>" name="title" type="text" class="form-control" id="title">
    </div>
    <div class="mb-3">
        <label for="description">Опис</label>
        <textarea name="description" class="form-control" id="description"
                  rows="3"><?= $event['description'] ?></textarea>
    </div>
    <div class="mb-3">
        <label for="start_date">Дата початку</label>
        <input value="<?= $event['start_date'] ?>" name="start_date" type="date" class="form-control"
               id="start_date">
    </div>
    <div class="mb-3">
        <label for="end_date">Дата закінчення</label>
        <input value="<?= $event['end_date'] ?>" name="end_date" type="date" class="form-control"
               id="end_date">
    </div>
    <div class="col-4">
        <img src="<?= $filePath ?>" class="img-fluid rounded" alt="Image">
    </div>

    <div class="mb-3">
        <label for="image" class="form-label">Зображення</label>
        <input name="image" class="form-control" type="file" id="image" accept="image/png, image/jpg, image/jpeg">
    </div>
    <div class="row">
        <button type="submit" class="btn btn-success">Зберегти</button>
    </div>
    <div class="row mt-2">
        <a href="/admin/events" class="btn btn-secondary">Повернутися назад</a>
    </div>
</form>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>

<script>
    $("#event").validate({
        rules: {
            title: {
                required: true,
                minlength: 3
            },
            description: {
                required: true,
                minlength: 30
            },
            start_date: {
                required: true,
            },
            end_date: {
                required: true,
                greaterThan: "#start_date"
            }
        },
        messages: {
            title: {
                required: "Заголовок обов'язкове поле",
                minlength: jQuery.validator.format("Довжина повинна бути {0} або більше")
            },
            description: {
                required: "Опис обов'язкове поле",
                minlength: jQuery.validator.format("Довжина повинна бути {0} або більше")
            },
            start_date: {
                required: "Дата початку обов'язкове поле",
            },
            end_date: {
                required: "Дата закінчення обов'язкове поле",
            },
        },

        submitHandler: function (form) {
            form.submit();
        }
    });

    jQuery.validator.addMethod("greaterThan",
        function (value, element, params) {

            if (!/Invalid|NaN/.test(new Date(value))) {
                return new Date(value) > new Date($(params).val());
            }

            return isNaN(value) && isNaN($(params).val())
                || (Number(value) > Number($(params).val()));
        }, 'Повинна бути більше початкової дати.');
</script>
