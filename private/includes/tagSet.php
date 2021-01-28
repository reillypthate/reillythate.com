<!-- Tag Set -->
<ol class="tag-container"<?php echoAttributes($attributes); ?>>
<?php foreach($tagSet as $tag): ?>
    <li><?php tag($tag); ?></li>
<?php endforeach; ?>
</ol>