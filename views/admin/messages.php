<?php
/**
 * @var array|null $messages
 */

$this->Title = 'Повідомлення';
?>
<h1 class="text-center">Повідомлення</h1>
<table id="messages-table" class="table table-striped" style="width:100%">
    <thead>
    <tr>
        <th>Id</th>
        <th>Ім'я відправника</th>
        <th>Ел.пошта відправника</th>
        <th>Повідомлення</th>
        <th>Дата відправлення</th>
        <th>Дії</th>
    </tr>
    </thead>
    <tbody>
    <?php if (!empty($messages)) : foreach ($messages as $message): ?>
        <tr>
            <td><?= $message['id'] ?></td>
            <td><?= $message['name'] ?></td>
            <td><?= $message['email'] ?></td>
            <td><?= $message['message'] ?></td>
            <td><?= $message['created_at'] ?></td>
            <td>
                <div class="d-flex">
                    <button type="button" class="btn btn-danger btn-delete" data-bs-toggle="modal"
                            data-bs-target="#deleteModal" data-message-id="<?= $message['id'] ?>">
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
        $('#messages-table').DataTable({
            stateSave: true
        });

        $('#messages-table tbody').on('click', '.btn-delete', function () {
            let messageId = $(this).data('message-id');
            let deleteModal = $('#deleteModal');

            deleteModal.find('.modal-footer .btn-danger').attr('href', '/contact/delete/' + messageId);

            deleteModal.modal('show');
        });
    })
</script>
