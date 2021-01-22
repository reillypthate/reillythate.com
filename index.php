<?php 
    // Before we do anything, we need to initialize a bunch of stuff: namely, 
    // universal constants (for ease of access) and a database connection.
    require_once("private/initialize.php");
    
    // Page Metadata
    $SLUG = "reillythate.com";
    pushFootScripts("page-specific/home/bg-video.js");
    pushFootScripts("modules/parallax.js");
?>
<?php require_once(DOC_PREFIX . SHARED_PATH . "/public-head/index.php"); ?>
		
		<main id="home-page">
            <section id="home-page__intro">
                <div class="video-background__container">
                    <iframe id="ruthless-video" class="video-background" src="https://player.vimeo.com/video/501963127?background=1" allow="autoplay; fullscreen;loop;"  allowfullscreen></iframe>
                </div>
                <div class="home-page__intro-overlay">
                    <h2>Filmmaker. Web Developer. Artist.</h2>
                </div>
            </section>
            <section class="page-break">
                <h2>My name is Reilly Thate.</h2>
                <p>I am an artist with a background in science.</p>
                <p>My artistic goal is to integrate craftsmanship and self-education into my creative process with the end goal of seeing my vision come to life in new and unique ways.</p>
            </section>
            <a class="home-section" href="<?php echo l('portfolio'); ?>">
                <div class="parallax-image__container">
                    <?php img("poster-night-lift", array("data-speed"=>-1)); ?>
                </div>
                <div class="parallax-image__container-overlay white-text">
                    <h3>Portfolio</h3>
                    <p>Films, designs, and more!</p>
                </div>
            </a>
            <section class="page-break">
                <h2>If done right, a simple idea can leave a lasting impression.</h2>
                <p>I have a flair for leveraging the beauty of complexity into my work, but I also recognize the value of simplicity: in communication, in planning, and in lifestyle, sometimes the best way to get the job done is to focus on the basics.</p>
            </section>
            <a class="home-section" href="<?php echo l('blog'); ?>">
                <div class="parallax-image__container">
                    <?php img("experience-books", array("data-speed"=>-0.5)); ?>
                </div>
                <div class="parallax-image__container-overlay white-text">
                    <h3>Blog</h3>
                    <p>In-depth articles!</p>
                </div>
            </a>
            <section class="page-break">
                <h2>Whether it be film, computer science, or any other field that interests me...</h2>
                <p>I aspire to develop a well-rounded knowledge base with a complementary skillset.</p>
            </section>
            <a class="home-section" href="<?php echo l('about'); ?>">
                <div class="parallax-image__container">
                    <?php img("reilly-thate-profile-01", array("data-speed"=>-0.5)); ?>
                </div>
                <div class="parallax-image__container-overlay white-text">
                    <h3>About</h3>
                    <p>Dive deeper!</p>
                </div>
            </a>

            <section class="page-break">
                <h2>Welcome to My Site!</h2>
            </section>

            <section id="home-page__conclusion">
                <div class="parallax-image__container">
                    <?php img('renegade-spray-design', array("data-speed"=>-1)); ?>
                </div>
                <div class="parallax-image__container-overlay">
                    <?php img("reilly-thate-profile-01", array("id"=>"home-page__conclusion-profile")); ?>
                    <article id="home-page__conclusion-content">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto omnis excepturi voluptatem doloribus aspernatur eum repellat sed consectetur, dolor, deleniti ut quidem voluptatibus itaque doloremque!</p>
                    </article>
                </div>
            </section>
        </main>

<?php require_once(DOC_PREFIX . SHARED_PATH . "/public-foot/index.php"); ?>