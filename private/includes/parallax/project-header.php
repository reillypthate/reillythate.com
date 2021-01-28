                    <!-- Project Header w/ Parallax Background-->
                    <div class="parallax-container">
                        <div class="parallax-image__container">
                            <?php img($bannerSlug, array("data-speed"=>-1)); ?>
                        </div>
                        <div class="parallax-image__container-overlay">
                            <h2 class="project-header__title"><?php echo $project['title']; ?></h2>
                            <?php tagSet($projectContent[TAG]); ?>
                            <?php echo html_entity_decode($project['summary']); ?>
                        </div>
                    </div>
