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
                            <a class="text-decoration-none mb-2" href="/posts/view/<?= $post['id'] ?>">
                                <h3 class="card-text"><?= $post['title'] ?></h3>
                            </a>
                            <h5 class="card-text mb-2"><?= $post['author_surname'] ?> <?= $post['author_name'] ?></h5>
                            <p class="card-text mt-auto">Дата публікації: <?= $post['created_at'] ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>
