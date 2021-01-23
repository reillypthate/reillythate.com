<!-- Blog Gallery -->
<div class="blog-gallery">
<?php foreach($blogPosts as $index=>$post): ?>
    <div class="blog-container">
<?php blogPostPreview($post); ?>
    </div>
<?php endforeach; ?>
</div>
