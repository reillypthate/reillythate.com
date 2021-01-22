                    <!-- Portfolio Piece Preview w/ Parallax Background-->
                    <a class="parallax-container" href="<?php echo l('portfolio-piece') . "/index.php?project=" . $contentSlug; ?>">
                        <div class="parallax-image__container">
                            <?php img($imageSlug, array("data-speed"=>$parallaxStrength)); ?>
                        </div>
                        <div class="parallax-image__container-overlay white-text">
                            <h3><?php echo $contentRow['title']; ?></h3>
                            <?php echo html_entity_decode($contentRow['summary']); ?>

                        </div>
                    </a>
