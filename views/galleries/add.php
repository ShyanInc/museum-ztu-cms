<?php
$this->Title = 'Створення галереї';
?>
<h1 class="text-center mt-1">Створення галереї</h1>
<form id="gallery" method="post" action="" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="title">Заголовок</label>
        <input name="title" type="text" class="form-control" id="title">
    </div>
    <div class="mb-3">
        <label for="description">Опис</label>
        <textarea name="description" class="form-control" id="description"
                  rows="3"></textarea>
    </div>
    <div class="mb-3">
        <label for="short_description">Короткий опис</label>
        <input name="short_description" type="text" class="form-control"
               id="short_description">
    </div>
    <div class="mb-3">
        <label for="image" class="form-label">Зображення</label>
        <input name="image" class="form-control" type="file" id="image" accept="image/png, image/jpg, image/jpeg">
    </div>
    <div class="row">
        <button type="submit" class="btn btn-success">Зберегти</button>
    </div>
    <div class="row mt-2">
        <a href="/admin/galleries" class="btn btn-secondary">Повернутися назад</a>
    </div>
</form>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>

<script>
    $("#gallery").validate({
        rules: {
            title: {
                required: true,
                minlength: 3
            },
            description: {
                required: true,
                minlength: 30
            },
            short_description: {
                required: true,
                minlength: 15
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
            short_description: {
                required: "Короткий опис обов'язкове поле",
                minlength: jQuery.validator.format("Довжина повинна бути {0} або більше"),
            },
        },

        submitHandler: function (form) {
            form.submit();
        }
    });
</script>
