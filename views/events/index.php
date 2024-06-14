<?php
/**
 * @var array|null $events Events
 */

$this->Title = 'Events';
?>
<h1 class="text-center">Події</h1>
<hr>
<?php if (!empty($events)) : ?>
    <div class="album">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <?php foreach ($events as $event): ?>
                <div class="col">
                    <div class="card shadow-sm">
                        <div class="gallery-card-image">
                            <img src="/globals/images/gallery.jpg" alt="gallery img">
                        </div>
                        <div class="card-body">
                            <h3 class="card-text"><?= $event['title'] ?></h3>
                            <p class="card-text">Початок: <?= $event['start_date'] ?></p>
                            <p class="card-text">Закінчення: <?= $event['end_date'] ?></p>
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
