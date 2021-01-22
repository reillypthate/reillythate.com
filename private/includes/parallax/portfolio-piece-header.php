                    <!-- Portfolio Piece Header w/ Parallax Background-->
                    <div class="parallax-container">
                        <div class="parallax-image__container">
                            <?php img($imageSlug, array("data-speed"=>$parallaxStrength)); ?>
                        </div>
                        <div class="parallax-image__container-overlay">
                            <h2 class="project-header__title"><?php echo $contentRow['title']; ?></h2>
                            <ol class="tag-container">
<?php foreach($content->getTagsForContent($contentSlug) as $tag): ?>
					            <li><?php tag($tag); ?></li>
<?php endforeach; ?>
				            </ol>
                        </div>
                    </div>
                    <div class="page-break">
                        <h3>Summary</h3>
                        <?php echo html_entity_decode($contentRow['summary']); ?>
                    </div>
