<!-- Blog Gallery -->
<div class="blog-gallery">
<?php foreach($posts as $index=>$postId): ?>
    <div class="blog-container">
<?php portfolioParallaxPreview($data[BLOG]->slugById($postId)); ?>
    </div>
<?php endforeach; ?>
</div>
