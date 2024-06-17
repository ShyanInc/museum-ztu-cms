<?php
/**
 * @var array|null $events
 */

$this->Title = 'Управління подіями';
?>
<h1 class="text-center">Управління подіями</h1>
<hr>
<div class="d-flex justify-content-center">
    <a href="/events/add">
        <button type="button" class="btn btn-success"><i class="bi bi-plus-circle"></i><span> Створити подію
        </span></button>
    </a>
</div>
<hr>
<h2 class="text-center">Події</h2>
<table id="events-table" class="table table-striped" style="width:100%">
    <thead>
    <tr>
        <th>Id</th>
        <th>Заголовок</th>
        <th>Опис</th>
        <th>Дата початку</th>
        <th>Дата кінця</th>
        <th>Зображення</th>
        <th>Дії</th>
    </tr>
    </thead>
    <tbody>
    <?php if (!empty($events)) : foreach ($events as $event): ?>
        <?php
        $imagePath = '/globals/images/event.png';
        if (!empty($event['image'])) {
            $imagePath = $event['image'];
        }
        ?>
        <tr>
            <td><?= $event['id'] ?></td>
            <td><?= $event['title'] ?></td>
            <td><?= $event['description'] ?></td>
            <td><?= $event['start_date'] ?></td>
            <td><?= $event['end_date'] ?></td>
            <td><img src="<?= $imagePath ?>" alt="" height="40px"></td>
            <td>
                <div class="d-flex gap-2">
                    <a class="btn btn-secondary" href="/events/edit/<?= $event['id'] ?>">
                        <i class="bi bi-pen"></i>
                    </a>
                    <button type="button" class="btn btn-danger btn-delete" data-bs-toggle="modal"
                            data-bs-target="#deleteModal" data-event-id="<?= $event['id'] ?>">
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
        $('#events-table').DataTable({
            stateSave: true
        });

        $('#events-table tbody').on('click', '.btn-delete', function () {
            let eventId = $(this).data('event-id');
            let deleteModal = $('#deleteModal');

            deleteModal.find('.modal-footer .btn-danger').attr('href', '/events/delete/' + eventId);

            deleteModal.modal('show');
        });
    })
</script>
