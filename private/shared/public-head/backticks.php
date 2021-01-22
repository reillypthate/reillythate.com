<?php if($SLUG != 'reillythate.com'): ?>
            <nav id="backticks">
                <ul>
<?php $linkStack = $content->getDirectory()->getLinkStack($content->getDirectory()->getIdFromSlug($SLUG), array()); ?>
<?php for($i = count($linkStack) - 2; $i >= 0; $i--): ?>
                    <li class="level_<?php echo count($linkStack) - $i; ?>"><a href="<?php echo $linkStack[$i][1];?>"><?php echo $linkStack[$i][0]; ?></a></li>
    <?php endfor; ?>
                </ul>
            </nav>
<?php endif; ?>