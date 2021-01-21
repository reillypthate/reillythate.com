            <!-- Nav Toggle (active when device width < 768px) -->
            <button type="button" id="nav-menu-toggle" class="collapsible"></button>
            <!-- Main Nav -->
            <nav id="nav_primary">
                <ul class="nav-ul-grid">
<?php foreach($nav_slugs as $key=>$slug): ?>
                    <li><a <?php if($SLUG == $slug): ?>class="nav_active_page"<?php else: ?>href="<?php echo $directory_table->linkBySlug($slug); ?>"<?php endif; ?>><?php echo ucwords($slug); ?></a></li>
<?php endforeach; ?>
                </ul>
            </nav>
