<!-- Entity Gallery -->
<div class="entity-gallery">
<?php foreach($entities as $index=>$entityId): ?>
    <div class="entity-container">
        <?php entity($entityId); ?>
    </div>
<?php endforeach; ?>
</div>