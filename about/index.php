<?php 
    // Before we do anything, we need to initialize a bunch of stuff: namely, 
    // universal constants (for ease of access) and a database connection.
    require_once("../private/initialize.php");
?>
<?php
	// Page Metadata
	$SLUG = "about";
    pushFootScripts("modules/parallax.js");
?>
<?php require_once(DOC_PREFIX . SHARED_PATH . "/public-head/index.php"); ?>
		
		<main id="home-page">
			<section class="page-break">
				<h2>Welcome to My Site!</h2>
			</section>
            <section id="home-page__conclusion">
                <div class="parallax-image__container">
                    <?php img('renegade-spray-design', array("data-speed"=>-1)); ?>
                </div>
                <div class="parallax-image__container-overlay white-text">
                    <?php img("reilly-thate-profile-01", array("id"=>"home-page__conclusion-profile")); ?>
                    <article id="home-page__conclusion-content">
						<h3>Reilly Thate</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto omnis excepturi voluptatem doloribus aspernatur eum repellat sed consectetur, dolor, deleniti ut quidem voluptatibus itaque doloremque!</p>
                    </article>
                </div>
            </section>
            <section class="page-break">
                <h2>Experience</h2>
				<p>Since June 2020, I've been working as an Assistant Producer/Editor at Seltzer Film & Video.</p>
				<p>Between school and work, I spend my time working on films with my friends or working on my web development skills.</p>
            </section>
            <section class="page-break">
				<h2>Education</h2>
				<p>My academic career has enriched me with knowledge from a broad range of scientific and artistic disciplines, and has prepared me to continue my education beyond the university setting.</p>
                <p>I graduated from Rochester Institute of Technology in 2018 with a bachelor's degree in Bioinformatics.</p>
				<p>I'm currently taking classes at Anne Arundel Community College to build my foundation in Media Production and Web Design.</p>
            </section>
            <a class="home-section" href="<?php echo $directory_table->linkBySlug('portfolio'); ?>">
                <div class="parallax-image__container">
                    <?php img("poster-night-lift", array("data-speed"=>-1)); ?>
                </div>
                <div class="parallax-image__container-overlay white-text">
                    <h3>Portfolio</h3>
                    <p>Films, designs, and more!</p>
                </div>
            </a>
            <a class="home-section" href="<?php echo $directory_table->linkBySlug('blog'); ?>">
                <div class="parallax-image__container">
                    <?php img("experience-books", array("data-speed"=>-0.5)); ?>
                </div>
                <div class="parallax-image__container-overlay white-text">
                    <h3>Blog</h3>
                    <p>In-depth articles!</p>
                </div>
            </a>

        </main>
		<main>
            <section id="about_card">
				<img src="<?php echo $directory_table->linkToImage("PROFILE_ReillyThate.jpg");?>" alt="<?php echo $image_table->getRowFromImageSlug("reilly-thate-profile-01")['alt'];?>">
				<article id="about_thesis">
					<h2>About Reilly Thate</h2>
					<p>
						Reilly Thate is an artist with a background in science.
					</p>
					<p>
						Whether it be film, computer science, or any other field that interests him, he aspires to develop a well-rounded knowledge base with a complementary skillset.
					</p>
<?php /*
					<h3><a href="<?php echo $directory_table->linkToPage("Education"); ?>">Education</a></h3>
					<p>
						A.A.S. Media Production &mdash; Anne Arundel Community College (In Progress)
					</p>
					<p>
						B.S. Bioinformatics &mdash; Rochester Institute of Technology (2018)

					</p>
					<h3><a href="<?php echo $directory_table->linkToPage("Experience"); ?>">Experience</a></h3>
					<ul>
						<li><a href="<?php echo $directory_table->linkToPage("Film");?>">Film</a></li>
						<li><a href="<?php echo $directory_table->linkToPage("Science");?>">Science</a></li>
						<li><a href="<?php echo $directory_table->linkToPage("Design");?>">Design</a></li>
					</ul>
*/ ?>
				</article>
			</section>
<?php //$card_table->generateCardSection(array("experience", "film", "science", "design"), 3, 3); ?>
<?php $card_table->generateCardSection(array("education", "rit", "aacc"), 3, 3); ?>

        </main>

		<?php require_once(DOC_PREFIX . SHARED_PATH . "/public-foot/index.php"); ?>