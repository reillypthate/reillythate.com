<?php 
    // Before we do anything, we need to initialize a bunch of stuff: namely, 
    // universal constants (for ease of access) and a database connection.
    require_once("../private/initialize.php");
?>
<?php
    // Page Metadata
	$page_title = "About";
    $page_description = "An overview of Reilly Thate.";
    $wanted_stylesheets = "common.css";
    $wanted_ext_js = "wzrd.io.js";

    // Page Options
    $header_option = "";
    $footer_option = "";

    // Body Scripts
    $wanted_body_js = "test_body.js";
?>
<?php require_once(DOC_PREFIX . SHARED_PATH . "/page_head.php"); ?>
		
		<main>
            <h2>About</h2>
            <section id="about_thesis">
                <p>
                    Reilly Thate is an artist with a background in science.
                </p>
                <p>
                    Whether it be film, computer science, or any other field that interests him, he aspires to develop a well-rounded knowledge base with a complementary skillset.
                </p>
            </section>
            <section class="page_preview">
				<article class="description">
					<h2 class="trick-highlight">Academic Career</h2>
					<p>
						Reilly graduated from Rochester Institute of Technology in 2018 with a B.S. in Bioinformatics, and he is currently pursuing an A.A.S. in Media Production at Anne Arundel Community College.
					</p>
					<p>
						Reilly's education at R.I.T. incorporated intensive study where he developed proficiency in:
					</p>
					<ul>
						<li>Bioinformatics Algorithms</li>
						<li>Statistical Analysis</li>
						<li>Genetic Engineering</li>
					</ul>
					<p>
						At A.A.C.C., his education is focused on artistic endeavors with a focus on:
					</p>
					<ul>
						<li>Film Production</li>
						<li>Web/Graphic Design</li>
					</ul>
				</article>
			</section>
			<h2 class="trick-highlight">Experience</h2>
			<section class="page_preview">
				<article class="description">
					<h3>
						<a href="#" class="trick-highlight">
							Film
						</a>
					</h3>
					<p>
						Experienced in roles throughout all phases of production.
					</p>
					<p>
						Reilly has produced numerous short films with ambitious concepts that have allowed him to express his unique voice and tell interesting stories about multi-facted characters.
					</p>
					<p>
						All of his short films were written by him. As an aspiring filmmaker, he spends his free time writing screenplays for prospective projects ranging from a serialized comedy with elements of tragedy ("Under New Ownership") to a feature-length drama with elements of science fiction ("Mind Over").
					</p>
					<p>
						His most notable experience on set was as a director for his short film "Birthday Toast", which was produced as a final project for one of his media production classes. He brought effective leadership and contagious enthusiasm to the set, culminating in one of his favorite projects to date.
					</p>
					<p>
						In addition to work behind the camera, Reilly brings finely-tuned acting instincts from the stage (as Juror Three in Twelve Angry Men) to the screen with a diverse character range that enables him to bring his visions to life.
					</p>
				</article>
			</section>
			<section class="page_preview">
				<article class="description">
					<h3>
						<a href="#" class="trick-highlight">
							Science
						</a>
					</h3>
					<p>
						Reilly graduated from Rochester Institute of Technology in 2018 with a B.S. in Bioinformatics and immersion in Mathematics.
					</p>
					<p>
						His science background began in high school when he was enrolled in his school's STEM magnet program. During high school, he learned how to program, how to work with a team, and how to conduct research. His high school career culminated in a capstone research project entitled "Music-Induced Hearing Loss", where he took inspiration from his own pathological hearing loss to research how habitually listening to music can contribute to sensorineural hearing loss.
					</p>
					<p>
						Before his college career began, Reilly participated in RIT's IMPRESS program, where he developed his foundation in metacognitive thinking. He studied Computer Engineering during his first year, and then studied Bioinformatics for the final three.
					</p>
					<p>
						He was involved in research opportunities with Dr. Feng Cui at RIT between 2016&ndash;2017 and with Dr. Todd Treangen at University of Maryland, College Park during a summer internship in 2017.
					</p>
					<p>
						Reilly hopes to apply his extensive STEM background and scientific mind to his creative endeavors.
					</p>
				</article>
			</section>
			<section class="page_preview">
				<article class="description">
					<h3>
						<a href="#" class="trick-highlight">
							Design
						</a>
					</h3>
					<p>
						Skilled in web design, graphic design, and still art.
					</p>
					<p>
						Reilly brings his visions to reality by carefully weaving compositional elements together with great attention to detail.
					</p>
					<p>
						Meticulous and creative, Reilly is well-equipped to develop a vision and bring it to fruition with or without constraints.
					</p>
					<p>
						By combining his unique creative mind with a professional approach to tasks, Reilly is able to apply his talents to professional endeavors. 
					</p>
				</article>
			</section>
        </main>

<?php require_once(DOC_PREFIX . SHARED_PATH . "/page_foot.php"); ?>