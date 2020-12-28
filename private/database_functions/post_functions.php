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

    public function buildTable()
    {
        global $directory_table;
        
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
                echo '<button onclick="window.location.href=\'' . $directory_table->linkBySlug('blog-admin') . '/post/index.php?edit-post=' . $row['id'] . '\'">Edit</button>';
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
        $renegade_stroke = $directory_table->linkToImage('Renegade_Stroke.svg');
        $time_html = date("Y-m-d H:i:s.000", strtotime($post['updated_at']));
        $time_normal = date("M j, Y", strtotime($post['updated_at']));
        $read_time = $post['read_time'];
        if($read_time < 1)
        {
            $read_time = "< 1 min Read";
        }else
        {
            $read_time = $read_time . " min Read";
        }

        $preview->pushLine(1, '<div class="preview-head">');
        $preview->pushLine(2, '<img class="renegade" src="' . $renegade_stroke . '" alt="' . "The Renegade logo, represented as simple strokes." . '">');
        /*
        $preview->pushLine(2, '<div class="preview-head_details">');
        $preview->pushLine(3, '<p class="author">R.T.</p>');
        $preview->pushLine(3, '<time datetime="' . $time_html . '">' . $time_normal .'</time>');
        $preview->pushLine(3, '<p class="reading-time">' . $read_time . '</p>');
        $preview->pushLine(2, '</div>');
        */
        $preview->pushLine(2, '<div class="preview-head_tags">');
        $preview->pushLine(3, '<p class="tag">Film</p>');
        $preview->pushLine(2, '</div>');
        $preview->pushLine(1, '</div>');
        
        $preview->pushLine(1, '<div class="preview-body">');
        $preview->pushLine(2, '<h2>' . $post['title'] . '</h2>');
        foreach(getArticleLines($post['body']) as $article_index=>$line)
        {
            $preview->pushLine(2, $line);
            break; // Break after the first line of the article has been read.
        }
        $preview->pushLine(1, '<p class="end-preview-link"><a href="' . $directory_table->linkBySlug($post['slug']) . '">Read More</a></p>');
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

    /**
     * For each individual Blog page, the body will be generated.
     */
    public function generateBlogLines($post_slug, $num_tabs)
    {
        global $directory_table, $image_table;
        $post = $this->getRowFromPostSlug($post_slug);
        $banner = $image_table->getRowFromImageId($post['banner']);
        $renegade_stroke = $directory_table->linkToImage('Renegade_Stroke.svg');
        $time_html = date("Y-m-d H:i:s.000", strtotime($post['updated_at']));
        $time_normal = date("M j, Y", strtotime($post['updated_at']));
        $read_time = $post['read_time'];
        if($read_time < 1)
        {
            $read_time = "< 1 min Read";
        }else
        {
            $read_time = $read_time . " min Read";
        }

        $blog = new Element();
        $blog->pushLine(0, '<article class="blog">');
        $blog->pushLine(1, '<div class="blog-header">');
        $blog->pushLine(2, '<img class="blog-banner" src="' . $directory_table->linkToImage($banner['name']) . '" alt="' . $banner['alt'] . '">');
        $blog->pushLine(2, '<div class="blog-header_details">');
        $blog->pushLine(3, '<h2 class="blog-title">' . $post['title'] . '</h2>');
        /*
        $blog->pushLine(3, '<img class="renegade" src="' . $renegade_stroke . '" alt="' . "The Renegade logo, represented as simple strokes." . '">');
        $blog->pushLine(3, '<div class="preview-head_details">');
        $blog->pushLine(4, '<p class="author">R.T.</p>');
        $blog->pushLine(4, '<time datetime="' . $time_html . '">' . $time_normal .'</time>');
        $blog->pushLine(4, '<p class="reading-time">' . $read_time . '</p>');
        $blog->pushLine(3, '</div>');
        $blog->pushLine(3, '<div class="preview-head_tags">');
        $blog->pushLine(4, '<p class="tag">Film</p>');
        $blog->pushLine(3, '</div>');
        */
        $blog->pushLine(2, '</div>');
        $blog->pushLine(1, '</div>');

        $lines = $post['body'];
        $counter = 1;
        while($startPoint = strpos($lines, "{~"))
        {
            $stopPoint = strpos($lines, "~}");
            $image_slug = substr($lines, $startPoint+2, $stopPoint - ($startPoint+2));
            $image = $image_table->getRowFromImageSlug($image_slug);
            //print_r($image);
            $linkToImage = $directory_table->linkToImage($image['name']);
            $imageAlt = $image['alt'];
            $original_image_text = substr($lines, $startPoint, $stopPoint+2 - $startPoint);
            //echo $original_image_text;
            $image_html = '<img src="' . $linkToImage . '" alt="' . $imageAlt . '">';
            $num_replacements = 1;
            //echo "<p>" . $original_image_text . "</p>";
            //echo "<p>" . $image_html . "</p>";
            $lines = str_replace($original_image_text, $image_html, $lines, $num_replacements);
            $startPoint = strpos($lines, "{~");
            $counter++;
            if($counter > 16) break;
        }
        
        $blog->pushLine(1, '<div class="blog-body">');
        foreach(getArticleLines($lines) as $index=>$line)
        {
            $blog->pushLine(2, $line);
        }
        $blog->pushLine(1, '</div>');

        $blog->pushLine(0, "</article>");

        return $blog->printLines($num_tabs);
    }
}
?>