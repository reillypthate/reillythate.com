<!-- Image Gallery -->
<div class="image-gallery img-count_<?php echo count($images);?>">
<?php foreach($images as $index=>$image): ?>
    <div class="image-container">
        <?php img($image['slug']); ?>
    </div>
<?php endforeach; ?>
</div>