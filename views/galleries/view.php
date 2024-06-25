<?php
/**
 * @var object $gallery ;
 */

$this->Title = $gallery['title'];
if (!empty($gallery['image'])) {
    $imagePath = $gallery['image'];
} else {
    $imagePath = '/globals/images/gallery.jpg';
}
?>
<hr>
<div class="d-flex justify-content-center view-image mb-4"><img src="<?= $imagePath ?>" alt="gallery image"></div>
<div class="border border-black rounded p-4">
    <h1 class="text-center"><?= $gallery['title'] ?></h1>
    <hr>
    <p class="fs-3"><?= $gallery['description'] ?></p>
</div>