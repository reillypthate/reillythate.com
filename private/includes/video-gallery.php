<!-- Video Gallery -->
<div class="video-gallery">
<?php foreach($videos as $index=>$video): ?>
    <div class="video-container">
        <?php video($video['id']); ?>
    </div>
<?php endforeach; ?>
</div>