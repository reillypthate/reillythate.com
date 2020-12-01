    
    <?php if(count($errors) > 0): ?>
        <div id="errors">
    <?php foreach($errors as $key=>$error): ?>
            <p class="error_message"><?php echo $error; ?></p>
    <?php endforeach; ?>
        </div>
    <?php endif; ?>