<?php $footer_slugs = array("admin", "about", "blog", "contact", "portfolio"); ?>
		<footer>
			<nav id="nav_footer">
				<ul>
<?php foreach($footer_slugs as $key=>$slug): ?>
                    <li><a <?php if($SLUG == $slug): ?>class="nav_active_page"<?php else: ?>href="<?php echo $directory_table->linkToPage($slug); ?>"<?php endif; ?>><?php echo ucwords($slug); ?></a></li>
<?php endforeach; ?>
				</ul>
			</nav>
			<p id="copyright">&copy; 2020 Reilly Thate</p>
			<a href="<?php echo $directory_table->linkToPage("reillythate.com"); ?>">
				<img id="renegade_footer" src="<?php echo $directory_table->linkToImage("Renegade_Blues.svg"); ?>" alt="Renegade logo.">
			</a>
		</footer>
<?php insertJavascriptFromSrcFiles(); ?>


	</body>
</html>