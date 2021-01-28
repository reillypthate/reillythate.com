<!-- Blog Preview: <?php echo $post['slug']; ?> -->
<article class="blog-preview">
    <div class="blog-preview__content">
<?php if(isset($post['banner'])): ?>
        <div class="blog-preview__banner-container">
            <div class="blog-preview__banner-overlay">
                <?php img($data[IMAGE]->slugById($post['banner'])); ?>
<?php else: ?>
        <div class="blog-preview__banner-container no-banner">
            <div class="blog-preview__banner-overlay">
<?php endif; ?>
                <?php img("renegade-stroke", array("class"=>"blog-preview__renegade")); ?>
                <div class="blog-preview__tags">
                    <p class="tag">Film</p>
                </div>
            </div>
        </div>
        <div class="blog-preview__information">
            <div class="blog-preview__head">
                <!-- <p class="blog-preview__author">Reilly Thate</p> -->
                <time class="blog-preview__date" datetime="<?php echo $time_html; ?>"><?php echo $time_normal; ?></time>
                <p class="blog-preview__read-time"><?php echo $read_time; ?></p>
            </div>
            <div class="blog-preview__body">
                <h2><?php echo $post['title']; ?></h2>
                <?php echo html_entity_decode($post['summary']); ?>
                <p class="end-preview-link"><a href="<?php echo $postLink; ?>">Read More</a></p>
            </div>
        </div>
    </div>
</article>
