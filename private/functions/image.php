<?php if(!isset($img_srcset)): ?>
<!-- Image --><img src="<?php echo $img_src; ?>" alt="<?php echo $img_alt; ?>"<?php if(isset($att)) echoAttributes($attributes); ?>>
<?php else: ?>
<!-- Image w/ srcset-->
    <img 
        srcset="<?php foreach($img_srcset as $key=>$value): ?>
<?php echo $image_table->linkBySlug($img['slug'], $key) . " " . $key . "w,"; ?>
<?php endforeach; ?><?php echo $image_table->linkBySlug($img['slug'], 1920); ?>"
        sizes="(max-width: 768px) 640px, (max-width: 1024px) 768px, (max-width: 1366px) 1024px, (max-width: 1600px) 1366px, (max-width: 1920px) 1600px, 1920px"
        src="<?php echo $image_table->linkBySlug($img['slug'], 1920); ?>"
        alt="<?php echo $img_alt; ?>"<?php if(isset($att)) echoAttributes($attributes); ?>
    >
<?php endif; ?>