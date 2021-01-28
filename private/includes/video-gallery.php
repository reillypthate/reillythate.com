<!-- Video Gallery -->
<div class="video-gallery">
<?php foreach($videos as $index=>$videoId): ?>
    <div class="video-container">
        <?php video($videoId); ?>
    </div>
<?php endforeach; ?>
</div>