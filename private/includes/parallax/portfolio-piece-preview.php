                    <!-- Portfolio Piece Preview w/ Parallax Background-->
                    <a class="parallax-container" href="<?php echo $projectLink; ?>">
                        <div class="parallax-image__container">
                            <?php img($bannerSlug, array("data-speed"=>$parallaxStrength)); ?>
                        </div>
                        <div class="parallax-image__container-overlay white-text">
                            <h3><?php echo $project['title']; ?></h3>
                            <?php echo html_entity_decode($project['summary']); ?>

                        </div>
                    </a>
