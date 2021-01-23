<?php if(!isset($img_srcset)): ?>
<!-- Image w/o srcset--><img src="<?php echo $img_src; ?>" alt="<?php echo $img_alt; ?>"<?php echoAttributes($attributes); ?>>
<?php else: ?>
<!-- Image w/ srcset--><img srcset="<?php for($i = 0; $i < count($s) - 1; $i++): ?><?php echo $s[$i] . ', '; ?><?php endfor; echo $s[count($s) - 1]; ?>" sizes="(max-width: 768px) 640px, (max-width: 1024px) 768px, (max-width: 1366px) 1024px, (max-width: 1600px) 1366px, (max-width: 1920px) 1600px, 1920px" src="<?php echo $imgSrc; ?>" alt="<?php echo $img_alt; ?>"<?php echoAttributes($attributes); ?>>
<?php endif; ?>