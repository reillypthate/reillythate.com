<?php 
    // Before we do anything, we need to initialize a bunch of stuff: namely, 
    // universal constants (for ease of access) and a database connection.
    require_once("../../private/initialize.php");
?>
<?php
    // Page Metadata
	$page_title = "HTML5 Elements";
    $wanted_stylesheets = "common.css";
    $wanted_ext_js = "test_head.js";

    // Page Options
    $header_option = "";
    $footer_option = "";

    // Body Scripts
    $wanted_body_js = "test_body.js";
?>
<?php require_once(DOC_PREFIX . SHARED_PATH . "/private_head.php"); ?>
		
		<main id="manager">
            <table>
                <thead>
<?php $html5_keys = array_keys($elements[0]); ?>
<?php foreach($html5_keys as $key=>$column): ?>
                    <th scope="col"><?php echo $column; ?></th>
<?php endforeach; ?>
                </thead>

                <tbody>
<?php foreach($elements as $key=>$element): ?>
                    <tr>
<?php foreach($html5_keys as $key2=>$column): ?>
                        <td><a href="https://developer.mozilla.org/en-US/docs/Web/HTML/Element/<?php echo $element['element']; ?>" target="_blank"><?php echo $element[$column]; ?></a></td>
<?php endforeach; ?>
                    </tr>
<?php endforeach; ?>
                </tbody>

                <tfoot>
                </tfoot>
            </table>
		</main>
        
<?php require_once(DOC_PREFIX . SHARED_PATH . "/private_foot.php"); ?>