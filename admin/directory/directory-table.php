<section>
<?php if($isEditingDirectory): ?>
                <!-- Edit Directory -->
                <h2>Edit Directory</h2>
                <form method="post" action="<?php echo $directory_table->linkBySlug("directory") . "/index.php"; ?>">
                    <input type="hidden" name="dir_id" value="<?php echo $directory_id; ?>">
                    <fieldset>
                        <legend>
                            Parent Directory
                        </legend>
                        <select name="dir_pid">
<?php foreach($directory_table->getTable() as $key=>$dirs): ?>
                            <option value="<?php echo $dirs['id'];?>"<?php if($dirs['id'] == $directory_pid){echo " selected";}?>><?php echo $dirs['slug']; ?></option>
<?php endforeach; ?>
                        </select>
                    </fieldset>
                    <fieldset>
                        <legend>
                            Directory Slug
                        </legend>
                        <input name="dir_slug" type="text" placeholder="slug-xxx-xxx" value="<?php echo $directory_slug; ?>">
                    </fieldset>
                    <fieldset>
                        <legend>
                            Metadata
                        </legend>
                        <input name="dir_title" type="text" placeholder="Title" value="<?php echo $directory_title; ?>">
                        <textarea name="dir_description" row="3" col="80" placeholder="Description (255ch)"><?php echo $directory_description; ?></textarea>
                    </fieldset>
                    <fieldset>
                        <legend>
                            Public or Backend
                        </legend>
                        <label for="dir_public">
                            <input name="dir_public" type="checkbox" <?php echo $directory_public; ?>><span class="after_button">Public</span>
                        </label>
                    </fieldset>
                    <fieldset>
                        <legend>
                            Published?
                        </legend>
                        <label for="dir_published">
                            <input name="dir_published" type="checkbox" <?php echo $directory_published; ?>><span class="after_button">Published</span>
                        </label>
                    </fieldset>
                    <button type="submit" name="dir_UPDATE">Update Directory</button>
                </form>
<?php else: ?>
                <!-- Add Directory -->
                <h2>Add New Directory</h2>
<?php include(DOC_PREFIX . SHARED_PATH . "/errors/errors.php"); ?>
                <form method="post" action="<?php echo $directory_table->linkBySlug("directory") . "/index.php"; ?>">
                    <fieldset>
                        <legend>
                            Parent Directory
                        </legend>
                        <select name="dir_pid">
<?php foreach($directory_table->getTable() as $key=>$dirs): ?>
                            <option value="<?php echo $dirs['id'];?>"><?php echo $dirs['slug']; ?></option>
<?php endforeach; ?>
                        </select>
                    </fieldset>
                    <fieldset>
                        <legend>
                            Directory Slug
                        </legend>
                        <input name="dir_slug" type="text" placeholder="slug-xxx-xxx">
                    </fieldset>
                    <fieldset>
                        <legend>
                            Metadata
                        </legend>
                        <input name="dir_title" type="text" placeholder="Title">
                        <textarea name="dir_description" row="3" col="80" placeholder="Description (255ch)"></textarea>
                    </fieldset>
                    <fieldset>
                        <legend>
                            Public or Backend
                        </legend>
                        <label for="dir_public">
                            <input name="dir_public" type="checkbox" checked><span class="after_button">Public</span>
                        </label>
                    </fieldset>
                    <fieldset>
                        <legend>
                            Published?
                        </legend>
                        <label for="dir_published">
                            <input name="dir_published" type="checkbox" checked><span class="after_button">Published</span>
                        </label>
                    </fieldset>
                    <?php console_log("Above Button"); ?>
                    <button type="submit" name="dir_ADD">Add Directory</button>
                </form>
<?php endif; ?>
            </section>