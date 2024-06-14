<?php
/**
 * @var array|null $galleries
 */

$this->Title = 'Управління галереями';
?>
<h1 class="text-center">Управління галереями</h1>
<hr>
<div class="d-flex justify-content-center">
    <a href="/galleries/add">
        <button type="button" class="btn btn-success"><i class="bi bi-plus-circle"></i><span> Створити галерею
        </span></button>
    </a>
</div>
<hr>
<h2 class="text-center">Галереї</h2>
<table id="galleries-table" class="table table-striped">
    <thead>
    <tr>
        <th>Id</th>
        <th>Заголовок</th>
        <th>Опис</th>
        <th>Короткий опис</th>
        <th>Зображення</th>
        <th>Дії</th>
    </tr>
    </thead>
    <tbody>
    <?php if (!empty($galleries)) : foreach ($galleries as $gallery): ?>
        <?php
        $imagePath = '/globals/images/gallery.jpg';
        if (!empty($gallery['image'])) {
            $imagePath = $gallery['image'];
        }
        ?>
        <tr>
            <td><?= $gallery['id'] ?></td>
            <td><?= $gallery['title'] ?></td>
            <td><?= $gallery['description'] ?></td>
            <td><?= $gallery['short_description'] ?></td>
            <td><img src="<?= $imagePath ?>" alt="" height="40px"></td>
            <td>
                <div class="d-flex gap-2">
                    <a class="btn btn-secondary" href="/galleries/edit/<?= $gallery['id'] ?>">
                        <i class="bi bi-pen"></i>
                    </a>
                    <button type="button" class="btn btn-danger btn-delete" data-bs-toggle="modal"
                            data-bs-target="#deleteModal" data-gallery-id="<?= $gallery['id'] ?>">
                        <i class="bi bi-trash"></i>
                    </button>
                </div>
            </td>
        </tr>
    <?php endforeach; endif; ?>
    </tbody>
</table>


<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Видалити?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Ви впевнені, що хочете видалити цю галерею?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Ні</button>
                <a class="btn btn-danger">Так, видалити</a>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.js"></script>

<script>
    $(document).ready(function () {
        $('#galleries-table').DataTable({
            stateSave: true
        });

        $('#galleries-table tbody').on('click', '.btn-delete', function () {
            let galleryId = $(this).data('gallery-id');
            let deleteModal = $('#deleteModal');

            deleteModal.find('.modal-footer .btn-danger').attr('href', '/galleries/delete/' + galleryId);

            deleteModal.modal('show');
        });
    })
</script>
