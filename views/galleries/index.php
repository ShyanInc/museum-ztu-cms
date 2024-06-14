<?php
/**
 * @var array|null $galleries Galleries
 */

$this->Title = 'Галереї';
?>
<h1 class="text-center">Галереї</h1>
<hr>
<?php if (!empty($galleries)) : ?>
    <div class="album">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <?php foreach ($galleries as $gallery): ?>
                <div class="col">
                    <div class="card shadow-sm">
                        <div class="gallery-card-image">
                            <img src="/globals/images/gallery.jpg" alt="gallery img">
                        </div>
                        <div class="card-body">
                            <h3 class="card-text"><?= $gallery['title'] ?></h3>
                            <p class="card-text"><?= $gallery['short_description'] ?></p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <button type="button" class="btn btn-sm btn-outline-secondary">Детальніше</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>
