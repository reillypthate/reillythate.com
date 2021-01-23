                    <!-- Blog Entry Preview w/ Parallax Background-->
                    <a class="parallax-container" href="<?php echo l('blog') . "/index.php?blog=" . $blogPost['slug']; ?>">
                        <div class="parallax-image__container">
                            <?php img($blogPost['image_slug'], array("data-speed"=>$parallaxStrength)); ?>
                        </div>
                        <div class="parallax-image__container-overlay">
                            <h3><?php echo $blogPost['title']; ?></h3>
                            <ol class="tag-container">
<?php foreach($content->getTagsForContent($blogPost['slug']) as $tag): ?>
					            <li><?php tag($tag); ?></li>
<?php endforeach; ?>
                            </ol>
                            <div class="blog-information">
                                <p>5 min read</p>
                            </div>
                        </div>
                    </a>