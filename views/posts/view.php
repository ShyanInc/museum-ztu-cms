<?php

/**
 * @var object $post ;
 */

$this->Title = $post['title'];
?>
<hr>
<div class="border border-black rounded p-4">
    <h1 class="text-center"><?= $post['title'] ?></h1>
    <p class="m-0"><?= $post['author_surname'] ?> <?= $post['author_name'] ?></p>
    <p class="m-0"><?= $post['created_at'] ?></p>
    <hr>
    <p class="fs-3"><?= $post['content'] ?></p>
</div>
