
<?php

$blog_link = l("blog") . "/index.php?blog=" . $post['slug'];
$renegade_stroke = li('Renegade_Stroke.svg');
$time_html = date("Y-m-d H:i:s.000", strtotime($post['updated_at']));
$time_normal = date("M j, Y", strtotime($post['updated_at']));
$read_time = $post['read_time'];
if($read_time < 1)
{
    $read_time = "< 1 min Read";
}else
{
    $read_time = $read_time . " min Read";
}

?>
<!-- Blog Preview: <?php echo $post['slug']; ?> -->
<article class="blog-preview">
    <div class="blog-preview__content">
        <div class="blog-preview__banner-container<?php if(!isset($post['banner'])) echo " no-banner"; ?>">
<?php if(isset($post['banner'])): ?>
<?php $banner = $content->getImages()[$post['banner']]['slug']; ?>
            <?php img($banner); ?>
<?php endif; ?>
            <div class="blog-preview__banner-overlay">
                <img class="blog-preview__renegade" src="<?php echo $renegade_stroke; ?>" alt="The Renegade logo, represented as simple strokes.">
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
                <p class="end-preview-link"><a href="<?php echo $blog_link; ?>">Read More</a></p>
            </div>
        </div>
    </div>
</article>
