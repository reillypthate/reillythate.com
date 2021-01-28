<?php
define("ASSETS", "asset-functions");
define("COMPOUND", "compound-functions");

//  Tier 1: Simple components
require_once(ASSETS . '/entity.php');
require_once(ASSETS . '/image.php');
require_once(ASSETS . '/tag.php');
require_once(ASSETS . '/video.php');

//  Tier 2: Compound components
require_once(COMPOUND . '/parallax-previews.php');
require_once(COMPOUND . '/blog-page.php');
require_once(COMPOUND . '/project-page.php');

?>