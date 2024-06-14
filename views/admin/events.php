<?php
/**
 * @var array|null $events
 */

$this->Title = 'Управління подіями';
?>
<h1 class="text-center">Управління подіями</h1>
<table id="categories-table" class="table table-striped" style="width:100%">
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
    <?php foreach ($events as $event): ?>
        <?php
        $imagePath = '/globals/images/gallery.jpg';
        if (!empty($gallery['image'])) {
            $imagePath = $gallery['image'];
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
                <div class="d-flex justify-content-between">
                    <a class="btn btn-secondary" href="/events/edit">
                        <i class="bi bi-pen"></i>
                    </a>
                    <button type="button" class="btn btn-danger btn-delete" data-bs-toggle="modal"
                            data-bs-target="#deleteModal" data-category-id="">
                        <i class="bi bi-trash"></i>
                    </button>
                </div>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
