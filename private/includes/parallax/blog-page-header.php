                    <!-- Portfolio Piece Header w/ Parallax Background-->
                    <div class="parallax-container">
                        <div class="parallax-image__container">
                            <?php img($blogPost['image_slug'], array("data-speed"=>$parallaxStrength)); ?>
                        </div>
                        <div class="parallax-image__container-overlay">
                            <h2 class="blog-header__title"><?php echo $blogPost['title']; ?></h2>
                            <!-- TAG SET GOES HERE -->
                            <div>
                                <?php echo html_entity_decode($blogPost['summary']); ?>
                            </div>
                            <div class="blog-information">
                                <p>5 min read</p>
                            </div>
                        </div>
                    </div>
