<?php if($SLUG != 'reillythate.com'): ?>
            <nav id="backticks">
                <ul>
<?php $linkStack = $data[DIRECTORY]->getLinkStack($data[DIRECTORY]->idBySlug($SLUG), array()); 

if(isset($DYNAMIC_BREADCRUMB))
{
    //  PUSH THE LAST TWO ARRAY ITEMS BACK, PUT THE CURRENT BLOG TITLE IN THE 0th position so it's on the breadcrumb set.
    $DYNAMIC_BREADCRUMB[1] = $linkStack[0][1] . '/' . $DYNAMIC_BREADCRUMB[1];
    $linkStack = array_merge(
        array($DYNAMIC_BREADCRUMB), $linkStack
    );
}

?>
<?php for($i = count($linkStack) - 2; $i >= 0; $i--): ?>
                    <li class="level_<?php echo count($linkStack) - $i; ?>"><a href="<?php echo $linkStack[$i][1];?>"><?php echo $linkStack[$i][0]; ?></a></li>
<?php endfor; ?>
                </ul>
            </nav>
<?php endif; ?>