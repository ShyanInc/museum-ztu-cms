<?php
/**
 * @var array|null $posts
 */

$this->Title = 'Управління публікаціями';
?>
<h1 class="text-center">Управління публікаціями</h1>
<table id="categories-table" class="table table-striped" style="width:100%">
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
    <?php foreach ($posts as $post): ?>
        <?php
        $imagePath = '/globals/images/gallery.jpg';
        if (!empty($gallery['image'])) {
            $imagePath = $gallery['image'];
        }
        ?>
        <tr>
            <td><?= $post['id'] ?></td>
            <td><?= $post['title'] ?></td>
            <td><?= $post['author'] ?></td>
            <td><?= $post['content'] ?></td>
            <td><?= $post['created_at'] ?></td>
            <td><?= $post['updated_at'] ?></td>
            <td>
                <div class="d-flex justify-content-between">
                    <a class="btn btn-secondary" href="/posts/edit">
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
