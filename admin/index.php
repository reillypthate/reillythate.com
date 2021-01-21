<?php 
    $NAV_SET = "admin";
    // Before we do anything, we need to initialize a bunch of stuff: namely, 
    // universal constants (for ease of access) and a database connection.
    require_once("../private/initialize.php");
?>
<?php
    // Page Metadata
    $SLUG = "admin";
    //array_push($wanted_stylesheets, "bootstrap/scss/bootstrap.css");
?>
<?php require_once(DOC_PREFIX . SHARED_PATH . "/public-head/index.php"); ?>
		
		<main>
            <section class="sidebar__menu-wrapper">
                <ul class="sidebar__menu">
                    <li>
                        <h2 tabindex="0" class="sidebar__heading">
                            Site
                        </h2>
                    </li>
                    <li class="sidebar__menu-region">
                        <ul>
                            <li id="side-menu-page" class="side-menu-item">
                                Pages
                            </li>
                            <li id="side-menu-post" class="side-menu-item">
                                Posts
                            </li>
                            <li id="side-menu-media" class="side-menu-item">
                                Media
                            </li>
                        </ul>
                    </li>
                </ul>
                <ul class="sidebar__menu is-togglable">
                    <li>
                        <h2 tabindex="0" class="sidebar__heading">
                            Site
                        </h2>
                    </li>
                    <li class="sidebar__menu-region">
                        <ul>
                            <li id="side-menu-page" class="side-menu-item">
                                Pages
                            </li>
                            <li id="side-menu-post" class="side-menu-item">
                                Posts
                            </li>
                            <li id="side-menu-media" class="side-menu-item">
                                Media
                            </li>
                        </ul>
                    </li>
                </ul>
                <ul class="sidebar__menu is-togglable">
                    <li>
                        <h2 tabindex="0" class="sidebar__heading">
                            Site
                        </h2>
                    </li>
                    <li class="sidebar__menu-region">
                        <ul>
                            <li id="side-menu-page" class="side-menu-item">
                                Pages
                            </li>
                            <li id="side-menu-post" class="side-menu-item">
                                Posts
                            </li>
                            <li id="side-menu-media" class="side-menu-item">
                                Media
                            </li>
                        </ul>
                    </li>
                </ul>
            </section>
		</main>

<?php require_once(DOC_PREFIX . SHARED_PATH . "/public-foot/index.php"); ?>