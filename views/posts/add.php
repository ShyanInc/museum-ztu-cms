<?php
$this->Title = 'Створення публікації';
?>

<h1 class="text-center mt-1">Створення публікації</h1>
<form id="post" method="post" action="" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="title">Заголовок</label>
        <input name="title" type="text" class="form-control" id="title">
    </div>
    <div class="mb-3">
        <label for="content">Вміст</label>
        <textarea name="content" class="form-control" id="content"
                  rows="3"></textarea>
    </div>
    <div class="row">
        <button type="submit" class="btn btn-success">Зберегти</button>
    </div>
    <div class="row mt-2">
        <a href="/admin/posts" class="btn btn-secondary">Повернутися назад</a>
    </div>
</form>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>

<script>
    $("#post").validate({
        rules: {
            title: {
                required: true,
                minlength: 3
            },
            content: {
                required: true,
                minlength: 30
            },
            author_id: {
                required: true,
                numeric: true
            }
        },
        messages: {
            title: {
                required: "Заголовок обов'язкове поле",
                minlength: jQuery.validator.format("Довжина повинна бути {0} або більше")
            },
            description: {
                required: "Вміст обов'язкове поле",
                minlength: jQuery.validator.format("Довжина повинна бути {0} або більше")
            },
            short_description: {
                required: "ID автора обов'язкове поле",
            },
        },

        submitHandler: function (form) {
            form.submit();
        }
    });
</script>
