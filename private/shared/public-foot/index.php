		<footer>
			<nav id="nav_footer">
				<ul>
<?php foreach($footer_slugs as $slug=>$title): ?>
                    <li><a <?php if($SLUG == $slug): ?>class="nav_active_page"<?php else: ?>href="<?php echo l($slug); ?>"<?php endif; ?>><?php echo $title; ?></a></li>
<?php endforeach; ?>
				</ul>
			</nav>
			<p id="copyright">&copy; 2020 Reilly Thate</p>
			<a id="footer-logo-to-home" href="<?php echo $home_link; ?>">
				<?php img('renegade-blues'); ?>
			</a>
		</footer>

        <!-- Javascript Body Files <?php if(count($wanted_body_js) == 0) echo "(N/A)"; ?> -->
<?php require_once('body_scripts.php'); ?>

	</body>
</html><?php // Finishing touches; for file output.
	if($to_static)
	{
		file_put_contents("index.html", callback(ob_get_contents()));
		html_refresh(array_fill_keys(array("refresh_id"), $_GET['html-refresh'])); // database_functions/backend_sd_functions.php
	}
?>