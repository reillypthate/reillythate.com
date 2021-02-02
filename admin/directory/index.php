<?php 
    $NAV_SET = "admin";
    // Before we do anything, we need to initialize a bunch of stuff: namely, 
    // universal constants (for ease of access) and a database connection.
    require_once("../../private/initialize.php");
?>
<?php
    // Page Metadata
	$SLUG = "directory";
?>
<?php require_once(DOC_PREFIX . SHARED_PATH . "/public-head/index.php"); ?>
        
<?php 
    if (isset($_GET['new-slug']))
    {
        $data[DIRECTORY]->printNewIndex($_GET['new-slug']);
    }
?>
<?php //print_r($directory_table->buildAllLinks()); ?>

<?php 
    function buildHierarchy($list)
    {
        global $data;
        //print_r($list);
        echo "<ul>";
        foreach($list as $parent=>$child)
        {
            $page = $data[DIRECTORY]->getRowFromId($parent);
            echo "<li>";
            echo "<div class=\"directory-item\"";
            echo " data-dir_id=\"" . $page['id'] . "\"";
            echo " data-dir_p_id=\"" . $page['p_id'] . "\"";
            echo " data-dir_slug=\"" . $page['slug'] . "\"";
            echo " data-dir_title=\"" . $page['title'] . "\"";
            echo " data-dir_description=\"" . $page['description'] . "\"";
            echo " data-dir_public=\"" . $page['public'] . "\"";
            echo " data-dir_published=\"" . $page['published'] . "\"";
            echo "><h3>" . $page['title'] . "</h3></div>";
            if(count($child) != 0)
            {
                echo buildHierarchy($child);
            }
            echo "</li>";
        }
        echo "</ul>";
    }
?>

		<main>
            <section id="link-list">
<?php buildHierarchy($data[DIRECTORY]->buildAllLinks()); ?>
            </section>
<?php //$directory_table->printTable(3); //printLines($directory_table->printTableLines(3), 3); ?>
            <div id="modal__edit-page" class="modal">
                <div class="modal-content">
                    <span class="close-button">&times;</span>
                    <form method="post" action="<?php echo l("directory") . "/index.php"; ?>">
                        <input type="hidden" name="db_type" value="dir">
                        <input type="hidden" name="db_dir_id" id="dir_id">
                        <input type="hidden" name="db_dir_p_id" id="dir_p_id">

                        <fieldset>
                            <legend>Directory Slug</legend>
                            <input name="db_dir_slug" type="text" placeholder="slug-xxx-xxx" id="dir_slug">
                        </fieldset>

                        <fieldset>
                            <legend>Metadata</legend>
                            <input name="db_dir_title" type="text" placeholder="Title" id="dir_title">
                            <textarea name="db_dir_description" row="3" col="80" placeholder="Description (255ch)" id="dir_description"></textarea>
                        </fieldset>

                        <fieldset>
                            <legend>Public or Backend</legend>
                            <label for="dir_public">
                                <input name="db_dir_public" type="checkbox" id="dir_public"><span class="after_button">Public</span>
                            </label>
                        </fieldset>

                        <fieldset>
                            <legend>Published?</legend>
                            <label for="dir_published">
                                <input name="db_dir_published" type="checkbox" id="dir_published"><span class="after_button">Published</span>
                            </label>
                        </fieldset>
                        <button type="submit" id="dir_submit" name="db_UPDATE">Update Directory</button>
                    </form>
                </div>
            </div>
        </main>
        
        <script>
            var di = $('.directory-item');
            di.css('background', 'lightgray');
            $('.directory-item').append('<div class="directory-item__buttons"><button class="directory-item__button-edit">Edit</button><button class="directory-item__button-add">Add</button></div>');

            $('.directory-item__button-edit').click(openEditModal);
            $('.directory-item__button-add').click(openAddModal);

            function openEditModal(i)
            {
                $(this).parents('.directory-item').append('<input type="hidden" id="active_directory">');

                $('#dir_submit').attr('name', 'db_UPDATE').text('Update Directory');
                $('#modal__edit-page').css('display', 'block');
                //  Set the input values to the respective directory's data.
                var a = $(this).parents('.directory-item');
                $('#dir_id').attr('value', a.data('dir_id'));
                $('#dir_p_id').attr('value', a.data('dir_p_id'));
                $('#dir_slug').attr('value', a.data('dir_slug'));
                $('#dir_title').attr('value', a.data('dir_title'));
                $('#dir_description').text(a.data('dir_description'));
                
                if(a.data('dir_public') == 1)
                {
                    $('#dir_public').attr('checked', "true");
                }
                if(a.data('dir_published') == 1)
                {
                    $('#dir_published').attr('checked', "true");
                }
            }
            function openAddModal(i)
            {
                $('#dir_submit').attr('name', 'db_ADD').text('Add Directory');
                $('#modal__edit-page').css('display', 'block');

                var a = $(this).parents('.directory-item');
                console.log(a.data());
                $('#dir_id').attr('value', null);
                $('#dir_p_id').attr('value', a.data('dir_id'));
                $('#dir_slug').attr('value', null);
                $('#dir_title').attr('value', null);
                $('#dir_description').text("");
                
                if(a.data('dir_public') == 1)
                {
                    $('#dir_public').attr('checked', null);
                }
                if(a.data('dir_published') == 1)
                {
                    $('#dir_published').attr('checked', null);
                }

            }

            $('#modal__edit-page').find('.close-button').click(function()
            {
                $('#modal__edit-page').css('display', 'none');
                $('#active_directory').remove();
            });
        </script>
        
<?php require_once(DOC_PREFIX . SHARED_PATH . "/public-foot/index.php"); ?>