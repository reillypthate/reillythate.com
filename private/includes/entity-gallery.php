<!-- Entity Gallery -->
<div class="entity-gallery">
<?php foreach($entities as $index=>$entity): ?>
    <div class="entity-container">
        <?php entity($entity['id']); ?>
    </div>
<?php endforeach; ?>
</div>