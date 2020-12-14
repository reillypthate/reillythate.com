<?php

use Trick\Element; // Call the `Element` class from the "Trick" namespace.

/** * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Site Directory Functions
 * + db_getSiteDirectory()
 * + getPageDescriptionFromTitle($page_title)
 * + getPageRobotsFromPageTitle($page_title)
 * + getPageIdFromPageTitle($page_title)
 * + buildURL($page_id)
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
/**
** This class contains the functions required to work with the Site Directory.
**/
class DirectoryTable extends DB_Functions
{
    private $hierarchy;

    function __construct()
    {
        parent::__construct("site_directory");
        $this->hierarchy = array();
        $this->chunkSubdirectories();
    }
    /**
     * Creates a dictionary that details the parent-child relationship between subdirectories.
     * Each row corresponds to its own dictionary with keys named "count" and "children".
     * 
     */
    private function chunkSubdirectories()
    {
        // Set the initial value, so we have a root directory group.
        $this->hierarchy['1'] = array();
        $this->hierarchy['1']['count'] = 0;
        $this->hierarchy['1']['children'] = array();

        foreach($this->table as $hierarchy_index=>$row)
        {
            if(($row['public'] == 1) && isset($row['p_id']))
            {
                if(array_key_exists($row['id'], $this->hierarchy))
                {
                }else
                {
                    $this->hierarchy[$row['id']] = array();
                    $this->hierarchy[$row['id']]['count'] = 0;
                    $this->hierarchy[$row['id']]['children'] = array();
                }
                if(array_key_exists($row['p_id'], $this->hierarchy))
                {
                    $this->hierarchy[$row['p_id']]['count']++;
                    array_push($this->hierarchy[$row['p_id']]['children'], $row['id']);
                }
            }else
            {
                continue;
            }
        }
        // print_r($hierarchy);

        return $this->hierarchy;
    }

    public function getRowFromSlug($page_slug)
    {
        return $this->getRowFromCellValue("slug", $page_slug);
    }
    public function getRowFromId($page_id)
    {
        return $this->getRowFromCellValue("id", $page_id);
    }

    // META functions.
    /**
    * Return the `title` of the page associated with the $page_slug.
    */
    public function getTitleFromSlug($page_slug)
    {
        return $this->getRowFromCellValue("slug", $page_slug)['title'];
    }
    public function getDescriptionFromSlug($page_slug)
    {
        return $this->getRowFromCellValue("slug", $page_slug)['description'];
    }
    public function getRobotsFromSlug($page_slug)
    {
        return $this->getRowFromCellValue("slug", $page_slug)['robots'];
    }

    // TABLE functions.
    public function getIdFromSlug($page_slug)
    {
        return $this->getRowFromCellValue("slug", $page_slug)['id'];
    }
    /**
     * A recursive function that constructs a URL backwards from a particular page in the `directory`.
     * 
     * Note: As constructed, this function returns a url for a STATIC site.
     */
    public function buildURL($page_id)
    {
        if($page_id == -1)
        {
            return "Error: Invalid page id. (If used w/ getPageIdFromPageTitle(...), check spelling of passed variable)";
        }

        // 1st, find the url associated with the $page_id and get the p_id.
        // ($page_id - 1) corresponds to $site_directory row index (if ordered by ID).
        $path_chunk = $this->table[$page_id - 1]['slug'];
        $parent_dir = $this->table[$page_id - 1]['p_id'];

        if($parent_dir) // If not null, it's a sub-directory. Continue recursion.
        {
            return $this->buildURL($parent_dir) . "/" . $path_chunk;
        }
        // $parent_dir is null; this is the website root. End recursion.
        return $path_chunk;
    }
    public function getLinkStack($page_id, $stack)
    {
        if($page_id == -1)
        {
            return "Error: Invalid page id.";
        }

        $current_link = array($this->table[$page_id - 1]['title'], $this->linkToPage($this->table[$page_id - 1]['slug']));
        array_push($stack, $current_link);

        $parent_dir = $this->table[$page_id - 1]['p_id'];

        if($parent_dir) // If not null, it's a sub-directory. Continue recursion.
        {
            return $this->getLinkStack($parent_dir, $stack);
        }
        // $parent_dir is null; this is the website root. End recursion.
        return $stack;
    }

    public function linkToPage($page_slug)
    {
        return "/" . $this->buildURL($this->getIdFromSlug($page_slug));
    }
    public function linkToImage($image)
    {
        return $this->linkToPage("images") . "/" . $image;
    }
    public function buildTable()
    {
        return $this->buildTableWithEditButton(TRUE, 'index.php?edit-dir');
    }

    private function fileLastUpdated($id)
    {
        $metaUpdated = filemtime(DOC_PREFIX. $this->buildURL($id) . '/index.php');
        //echo "<!-- " . date("Y-m-d H:i:s", $metaUpdated) . "\t" . $id . "/" . $page . " -->\n";
        //echo "<!-- " . strtotime(date("Y-m-d H:i:s", $metaUpdated)) . "\t" . $id . "/" . $page . " -->\n";
        return date("Y-m-d H:i:s", $metaUpdated);
    }
    public function printTable($num_tabs)
    {
        $table = new Element();

        $table->pushLine(1, '<table>');

        $table->pushLine(2, '<thead>');
        $table->pushLine(3, '<tr>');
        $table->pushLine(4, '<th scope="col">Parent</th>');
        $table->pushLine(4, '<th scope="col">Slug</th>');
        $table->pushLine(4, '<th scope="col">Published</th>');
        $table->pushLine(4, '<th scope="col"></th>'); // Column for Edit Button
        $table->pushLine(4, '<th scope="col"></th>'); // Column for Convert Button
        $table->pushLine(3, "</tr>");
        $table->pushLine(2, "</thead>");

        // Get the keys that will be used to iterate through the hierarchy var.
        $parent_keys = array_keys($this->hierarchy);
        $current_key = 0; // Use this to iterate through the hierarchy.

        $table->pushLine(2, "<tbody>");

        $head_updated = (strtotime($this->fileLastUpdated($this->getIdFromSlug('public-head'))) > strtotime($this->table[34]['last_updated']));
        echo $head_updated ? "Head Updated" : "";

        foreach($this->hierarchy as $h_keys=>$parent)
        {
            if($parent['count'] > 1) // Display only the parents with subdirectories.
            {
                // Get the directory information for this particular 'parent'.
                $row = $this->getRowFromId($parent_keys[$current_key]);
                // Get information regarding this index page's last update.
                $last_updated = 'Last Update: ' . $this->fileLastUpdated($row['id']);
                // Use this to determine whether the Update button will be disabled. If TRUE, it's disabled.
                $needs_update = ($head_updated || (strtotime($this->fileLastUpdated($row['id'])) > strtotime($row['last_updated']))) ? '' : ' disabled';
                $table->pushLine(3, '<tr>');
                $table->pushLine(4, '<th rowspan="' . ($parent['count']+1) . '" scope="rowgroup">' . $row['title'] . '</th>');
                $table->pushLine(4, '<td>' . $row['title'] . '</td>');
                //$table->pushLine(4, '<td>' . $row['slug'] . '</td>');
                $table->pushLine(4, '<td>' . ($row['published'] ? 'Yes' : 'No') . '</td>');
                $table->pushLine(4, '<td><button onclick="window.location.href=\'index.php?edit-dir=' . $row['id'] . '\'">Edit</button></td>');

                $table->pushLine(4, '<td>');
                $table->pushLine(5, $last_updated);
                $table->pushLine(5, '<button onclick="window.location.href=\'' . $this->linkToPage($row['slug']) . '/index.php?html-refresh=' . $row['id'] . '\'"' . $needs_update . '>HTML</button>');
                $table->pushLine(4, '</td>');

                $table->pushLine(3, '</tr>');
                
                // Iterate through the child
                foreach($parent['children'] as $c_keys=>$child)
                {
                    // Get the directory information for this particular 'parent'.
                    $row = $this->getRowFromId($child);
                    // Get information regarding this index page's last update.
                    $last_updated = 'Last Update: ' . $this->fileLastUpdated($row['id']);
                    // Use this to determine whether the Update button will be disabled. If TRUE, it's disabled.
                    $needs_update = ($head_updated || (strtotime($this->fileLastUpdated($row['id'])) > strtotime($row['last_updated']))) ? '' : ' disabled';

                    $table->pushLine(3, '<tr>');
                    $table->pushLine(4, '<td>&mdash; ' . $row['title'] . '</td>');
                    //$table->pushLine(4, '<td>' . $row['slug'] . '</td>');
                    $table->pushLine(4, '<td>' . ($row['published'] ? 'Yes' : 'No') . '</td>');
                    $table->pushLine(4, '<td><button onclick="window.location.href=\'index.php?edit-dir=' . $row['id'] . '\'">Edit</button></td>');

                    $table->pushLine(4, '<td>');
                    $table->pushLine(5, $last_updated);
                    $table->pushLine(5, '<button onclick="window.location.href=\'' . $this->linkToPage($row['slug']) . '/index.php?html-refresh=' . $row['id'] . '\'"' . $needs_update . '>HTML</button>');
                    $table->pushLine(4, '</td>');

                    $table->pushLine(3, '</tr>');
                    
                }
            }
            $current_key++;
        }

        $table->pushLine(2, "</tbody>");

        $table->pushLine(2, "<tfoot>");
        $table->pushLine(2, "</tfoot>");

        $table->pushLine(1, "</table>");

        return $table->printLines($num_tabs);
    }
}
?>