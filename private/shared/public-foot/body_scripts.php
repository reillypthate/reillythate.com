<?php
    foreach($wanted_body_js as $index => $script):
        $script_src = STATIC_PATH . "/scripts/" . $script;
?>
        <script type="text/javascript" src="<?php echo $script_src; ?>"></script>
<?php 
    endforeach; 
?>