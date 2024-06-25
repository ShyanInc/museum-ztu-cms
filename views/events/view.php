<?php

/**
 * @var object $event ;
 */

$this->Title = $event['title'];
if (!empty($event['image'])) {
    $imagePath = $event['image'];
} else {
    $imagePath = '/globals/images/event.png';
}
?>
<hr>
<div class="d-flex justify-content-center view-image mb-4"><img src="<?= $imagePath ?>" alt="event image"></div>
<div class="border border-black rounded p-4">
    <h1 class="text-center"><?= $event['title'] ?></h1>
    <hr>
    <p class="fs-3"><?= $event['description'] ?></p>
    <hr>
    <div>
        <p class="mb-1">Дата початку: <?= $event['start_date'] ?></p>
        <p class="mb-0">Дата закінчення: <?= $event['end_date'] ?></p>
    </div>
</div>
