<?php
declare(strict_types=1);

use Quiz\Models\Category;

$categoryModel = new Category();

$categories = $categoryModel->get();
?>

<style>
    .menu li {
        display: inline-block;
    }
</style>

<ul class="menu">
    <li><a href="/">Home</a></li>
    <?php
    foreach ($categories as $category) {
        ?>
        <li><a href="/?category=<?= $category['slug']?>"><?= $category['title'] ?></a></li>
    <?
    }
    ?>
</ul>
