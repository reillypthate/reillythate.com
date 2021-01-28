<!-- Image Gallery -->
<div class="image-gallery img-count_<?php echo count($images);?>">
<?php foreach($images as $index=>$imageId): ?>
    <div class="image-container">
        <?php img($data[IMAGE]->slugById($imageId)); ?>
    </div>
<?php endforeach; ?>
</div>