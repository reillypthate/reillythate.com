<?php
    foreach($wanted_stylesheets as $index => $stylesheet):
        $stylesheet_href = STATIC_PATH . "/stylesheets/" . $stylesheet;
?>
        <link rel="stylesheet" href="<?php echo $stylesheet_href; ?>">
<?php 
    endforeach; 
?>