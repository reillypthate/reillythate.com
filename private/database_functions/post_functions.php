<?php
use Trick\Element; // Call the `Element` class from the "Trick" namespace.

/** * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 *  Blog Functions
 * 
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

class PostTable extends DB_Functions
{
    function __construct()
    {
        parent::__construct("posts");
    }

  /**
    * Return the assoc_array of the row with the slug $post_slug.
    * ! Case sensitive!
    */
    public function getRowFromPostSlug($post_slug)
    {
        return $this->getRowFromCellValue("slug", $post_slug);
    }

    /**
     * Generate the lines for a blog preview specified by the @var post.
     * @return Element with lines for blog preview.
     */
    public function generateBlogPreview(&$post)
    {
        global $directory_table, $image_table;

        $preview = new Element();
        $preview->pushLine(0, '<article class="blog-preview">');
        if(isset($post['banner']))
        {
            $banner = $image_table->getRowFromImageId($post['banner']);
            $preview->pushLine(1, '<img class="banner" src="' . $directory_table->linkToImage($banner['name']) . '" alt="' . $banner['alt'] . '">');
        }
        $preview->pushLine(1, '<div class="preview-head">');
        $preview->pushLine(2, '<img class="renegade" src="' . $directory_table->linkToImage('Renegade_Stroke.svg') . '" alt="' . "The Renegade logo, represented as simple strokes." . '">');
        $preview->pushLine(2, '<div class="preview-head_details">');
        $preview->pushLine(3, '<p class="author">Reilly Thate</p>');
        $preview->pushLine(3, '<time datetime="' . date("Y-m-d H:i:s.000", strtotime($post['updated_at'])) . '">' . date("M j, Y", strtotime($post['updated_at'])) .'</time>');
        $preview->pushLine(2, '</div>');
        $preview->pushLine(1, '</div>');
        
        $preview->pushLine(1, '<div class="preview-body">');
        $preview->pushLine(2, '<h2>' . $post['title'] . '</h2>');
        foreach(getArticleLines($post['body']) as $article_index=>$line)
        {
            $preview->pushLine(2, $line);
            break; // Break after the first line of the article has been read.
        }
        $preview->pushLine(1, '<p class="end-preview-link"><a href="' . $directory_table->linkToPage($post['slug']) . '">Read More</a></p>');
        $preview->pushLine(1, '</div>');

        $preview->pushLine(0, '</article>');

        return $preview;
    }

    public function printBlogPreviews($num_tabs)
    {
        $previews = array();

        foreach($this->table as $post_index=>$post)
        {
            if($post['published'])
                array_push($previews, $this->generateBlogPreview($post));
        }
        foreach($previews as $preview_index=>$preview)
        {
            $preview->printLines($num_tabs);
        }
    }
    public function buildTable()
    {
        echo '<table>';
        echo '<thead>';
        if(true)
        {
            echo '<th scope="col"></th>';
        }
        echo '<th scope="col">Title</th>';
        echo '<th scope="col">Last Updated</th>';
        echo '<th scope="col">Created</th>';
        echo '<th scope="col">Published</th>';
        echo '</thead>';
        echo '<tbody>';
        foreach($this->table as $index=>$row)
        {
            echo '<tr>';
            if(true)
            {
                echo '<td>';
                echo '<button onclick="window.location.href=\'post/index.php?edit-post=' . $row['id'] . '\'">Edit</button>';
                echo '</td>';
            }
            echo '<td>' . $row['title'] . '</td>';
            echo '<td>' . date("m/d/Y", strtotime($row['updated_at'])) . '<br>' . date("(h:ia)", strtotime($row['updated_at'])) . '</td>';
            echo '<td>' . date("m/d/Y", strtotime($row['created_at'])) . '<br>' . date("(h:ia)", strtotime($row['created_at'])) . '</td>';
            echo '<td>' . $row['published'] . '</td>';
            echo '</tr>';
        }
        echo '</tbody>';
        echo '<tfoot></tfoot>';
        echo '</table>';
    }
}
?>