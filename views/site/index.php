<?php
/**
 * @var array|null $posts ;
 */

$this->Title = 'Головна';
?>
<div class="pt-5 text-center border-bottom hero-image">
    <h1 class="display-4 fw-bold text-body-emphasis">Ласкаво просимо до нашого музею!</h1>
    <div class="d-grid gap-2 d-sm-flex justify-content-sm-center my-4">
        <a href="/about">
            <button class="btn btn-primary btn-lg px-4 me-sm-3">Дізнатися більше</button>
        </a>
    </div>
</div>
<hr>
<div class="row row-cols-1 row-cols-md-2 align-items-md-center g-1">
    <div class="col d-flex flex-column align-items-start gap-1">
        <h2 class="fw-bold text-body-emphasis">Основні переваги</h2>
        <a href="/about" class="btn btn-primary btn-lg">Дізнатися більше</a>
    </div>

    <div class="col">
        <div class="row row-cols-1 row-cols-sm-2 g-4">
            <div class="col d-flex flex-column gap-2">
                <div class="feature-icon-small d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-4 rounded-3">
                    <i class="bi bi-collection"></i>
                </div>
                <h4 class="fw-semibold mb-0 text-body-emphasis">Богата історична колекція</h4>
            </div>

            <div class="col d-flex flex-column gap-2">
                <div class="feature-icon-small d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-4 rounded-3">
                    <i class="bi bi-book"></i>
                </div>
                <h4 class="fw-semibold mb-0 text-body-emphasis">Освітні програми та майстер-класи</h4>
            </div>

            <div class="col d-flex flex-column gap-2">
                <div class="feature-icon-small d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-4 rounded-3">
                    <i class="bi bi-buildings"></i>
                </div>
                <h4 class="fw-semibold mb-0 text-body-emphasis">Сучасні виставкові зали</h4>
            </div>

            <div class="col d-flex flex-column gap-2">
                <div class="feature-icon-small d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-4 rounded-3">
                    <i class="bi bi-award"></i>
                </div>
                <h4 class="fw-semibold mb-0 text-body-emphasis">Участь у міжнародних проектах</h4>
            </div>
        </div>
    </div>
</div>
<hr>
<div class="row g-5">
    <div class="col-md-8">
        <?php if (!empty($posts)): $post = $posts[0]; ?>
            <h3 class="display-5 text-center">Нова публікація</h3>
            <article class="blog-post">
                <h4 class="display-6 link-body-emphasis mb-1"><?= $post['title'] ?></h4>
                <p class="blog-post-meta"><?= $post['created_at'] ?>
                    by <span><?= $post['author_surname'] ?> <?= $post['author_name'] ?></span></p>
                <p><?= $post['content'] ?></p>
            </article>
        <?php else: ?>
            <h3 class="display-5 text-center">Публікацій поки немає</h3>
        <?php endif; ?>
    </div>
    <div class="col-md-4">
        <div>
            <h4 class="fst-italic">Нещодавні публікації</h4>
            <?php if (!empty($posts)): ?>
                <ul class="list-unstyled">
                    <?php foreach ($posts as $post): ?>
                        <li>
                            <a class="d-flex flex-column flex-lg-row gap-3 align-items-start align-items-lg-center py-3 link-body-emphasis text-decoration-none border-top"
                               href="posts/<?= $post['id'] ?>">
                                <div class="col-lg-8">
                                    <h6 class="mb-0"><?= $post['title'] ?></h6>
                                    <small class="text-body-secondary"><?= $post['created_at'] ?></small>
                                </div>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <p>Публікацій поки немає</p>
            <?php endif; ?>
        </div>
    </div>
</div>