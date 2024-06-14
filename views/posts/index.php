<?php
/**
 * @var array|null $posts
 */

$this->Title = 'Публікації';
?>
<h1 class="text-center">Публікації</h1>
<hr>
<?php if (!empty($posts)) : ?>
    <div class="album">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <?php foreach ($posts as $post): ?>
                <div class="col">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h3 class="card-text"><?= $post['title'] ?></h3>
                            <h5 class="card-text"><?= $post['author'] ?></h5>
                            <p class="card-text"><?= $post['content'] ?></p>
                            <p class="card-text">Дата публікації: <?= $post['created_at'] ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>
