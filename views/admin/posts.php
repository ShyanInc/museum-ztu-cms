<?php
/**
 * @var array|null $posts
 */

$this->Title = 'Управління публікаціями';
?>
<h1 class="text-center">Управління публікаціями</h1>
<hr>
<div class="d-flex justify-content-center">
    <a href="/posts/add">
        <button type="button" class="btn btn-success"><i class="bi bi-plus-circle"></i><span> Створити публікацію
        </span></button>
    </a>
</div>
<hr>
<table id="posts-table" class="table table-striped" style="width:100%">
    <thead>
    <tr>
        <th>Id</th>
        <th>Заголовок</th>
        <th>Автор</th>
        <th>Контент</th>
        <th>Дата створення</th>
        <th>Дата редагування</th>
        <th>Дії</th>
    </tr>
    </thead>
    <tbody>
    <?php if (!empty($posts)): foreach ($posts as $post): ?>
        <tr>
            <td><?= $post['id'] ?></td>
            <td><?= $post['title'] ?></td>
            <td><?= $post['author_surname'] ?> <?= $post['author_name'] ?></td>
            <td><?= $post['content'] ?></td>
            <td><?= $post['created_at'] ?></td>
            <td><?= $post['updated_at'] ?></td>
            <td>
                <div class="d-flex gap-2">
                    <a class="btn btn-secondary" href="/posts/edit/<?= $post['id'] ?>">
                        <i class="bi bi-pen"></i>
                    </a>
                    <button type="button" class="btn btn-danger btn-delete" data-bs-toggle="modal"
                            data-bs-target="#deleteModal" data-post-id="<?= $post['id'] ?>">
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
        $('#posts-table').DataTable({
            stateSave: true
        });

        $('#posts-table tbody').on('click', '.btn-delete', function () {
            let postId = $(this).data('post-id');
            let deleteModal = $('#deleteModal');

            deleteModal.find('.modal-footer .btn-danger').attr('href', '/posts/delete/' + postId);

            deleteModal.modal('show');
        });
    })
</script>

