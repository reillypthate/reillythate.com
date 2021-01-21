<?php

use Trick\Element; // Call the `Element` class from the "Trick" namespace.
// Use ELEMENT for:
    // Backend Admin table generator

/** * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Site Directory Functions
** * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

/**
** This class contains the functions required to work with the Site Directory.
**/
class DirectoryTable extends DB_Functions
{
    private $hierarchy;
    private $slugSet;

    function __construct()
    {
        parent::__construct("site_directory");

        $this->convertTableToAssoc();
        

        $this->hierarchy = array();
        $this->chunkSubdirectories();
        $this->buildSlugSet();
    }
    /**
     * Create a lookup table that returns the directory's id.
     */
    private function buildSlugSet()
    {
        $this->slugSet = array();

        foreach($this->table as $key=>$row)
        {
            $this->slugSet[$row['slug']] = $row['id'];
        }
    }
    /**
     * Return a URL to the page requested.
     */
    public function linkBySlug($page_slug)
    {
        // Check to see how the variable has been passed; if it's a slug (string), pass the associated ID to the function.
        // Otherwise, pass the 
        return "/" . $this->buildURL($this->getIdFromSlug($page_slug));
    }
    /**
     * Return a URL to the page requested.
     */
    public function linkById($page_id)
    {
        // Check to see how the variable has been passed; if it's a slug (string), pass the associated ID to the function.
        // Otherwise, pass the 
        return "/" . $this->buildURL($page_id);
    }
    public function linkToImage($image)
    {
        return $this->linkBySlug("images") . "/" . $image;
    }

    /**
     * Convert the table into an assoc array by 'id'.
     */
    private function convertTableToAssoc()
    {
        $tableAssoc = array();
        foreach($this->table as $t_index=>$row)
        {
            $tableAssoc[$row['id']] = $row;
        }
        $this->table = $tableAssoc;
        //print_r($this->table);
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
    /**
     * Build the hierarchy of links.
     */
    public function buildAllLinks()
    {
        $links = array();
        foreach($this->table as $index=>$row)
        {
            if($row['slug'] != "reillythate.com")
            {
                $links[$row['id']] = $row['p_id'];
                //$links[$row['slug']] = $this->getRowFromId($row['p_id'])['slug'];
            }
            //array_push($links, $this->linkBySlug($row['slug']));
        }
        return $this->r($links);
    }
    /**
     * Look through a series of key-value pairs where each key represents a
     * child and each value represents a parent.
     * Attempt to consolidate a set of child-parent pairs into an organized
     * hierarchy where each child has been grouped under its parent.
     */
    private function r($cp)
    {
        //  First, create a list of parents.
        $parents = array();
        foreach($cp as $key=>$value)
        {
            if(!array_key_exists($value, $parents))
            {
                $parents[$value] = array();
            }
        }
        //  Then, add the children to their respective parents.
        foreach($cp as $key=>$value)
        {
            $parents[$value][$key] = array();
            //array_push($parents[$value], $key);
        }
        return array(1=>$this->s($parents, 1));
        //return array("reillythate.com"=>$this->s($parents, "reillythate.com"));
    }
    private $failsafe = 0;
    //  Recursively go through this array, and when you find a match, return.
    /**
     * Assume each key corresponds to a non-empty array.
     */
    private function s($set, $parent, $child=null)
    {
        if($this->failsafe > 100)
        {
            die("Iterative steps too high.");
        }
        if(isset($child))
        {
            //  Recursive end state: The child does not correspond to a sibling.
            //  Return an empty array, corresponding to a lack of children.
            if(!array_key_exists($child, $set))
            {
                $this->failsafe++;
                return array();
            }else
            {
                $this->failsafe++;
                //  Otherwise, a sibling DOES exist. Set the child's value
                //  to a recursive call with a null CHILD and a $child PARENT.
                $child_value = $this->s($set, $child);
                unset($set[$child]);
                return $child_value;
            }
        }else
        {
            //  If the child isn't set, then we attempt to iterate through the
            //  given parent's children to see if they need to be tied to their
            //  siblings.
            //  If parent has no children, it's empty.
            if(count($set[$parent]) == 0)
            {
                $this->failsafe++;
                return array();
            }else
            {
            //  If the parent has children, connect them to the respective 
            //  sibling.
                foreach($set[$parent] as $next_child=>$value)
                {
                    //  ReillyThate.com -> About
                    //  Check to see if there's an about sibling.
                    if(array_key_exists($next_child, $set))
                    {
                        //  Create the hierarchy starting from this.
                        $temp = $this->s($set, $parent, $next_child);
                        //unset($set[$next_child]);
                        $set[$parent][$next_child] = $temp;
                    }else
                    {
                        $set[$parent][$next_child] = array();
                    }
                }
                return $set[$parent];
            }
        }
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
        return $this->slugSet[$page_slug];
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
        $path_chunk = $this->table[$page_id]['slug'];
        $parent_dir = $this->table[$page_id]['p_id'];

        if($parent_dir) // If not null, it's a sub-directory. Continue recursion.
        {
            return $this->buildURL($parent_dir) . "/" . $path_chunk;
        }
        // $parent_dir is null; this is the website root. End recursion.
        return $path_chunk;
    }
    /**
     * Used for navigation backticks.
     */
    public function getLinkStack($page_id, $stack)
    {
        if($page_id == -1)
        {
            return "Error: Invalid page id.";
        }

        $current_link = array($this->table[$page_id]['title'], $this->linkBySlug($this->table[$page_id]['slug']));
        array_push($stack, $current_link);

        $parent_dir = $this->table[$page_id]['p_id'];

        if($parent_dir) // If not null, it's a sub-directory. Continue recursion.
        {
            return $this->getLinkStack($parent_dir, $stack);
        }
        // $parent_dir is null; this is the website root. End recursion.
        return $stack;
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

        $head_updated = (strtotime($this->fileLastUpdated($this->getIdFromSlug('public-head'))) > strtotime($this->table[$this->getIdFromSlug('public-head')]['last_updated']));
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
                $table->pushLine(4, '<td><button onclick="window.location.href=\'' . $this->linkBySlug('directory') . '/index.php?edit-dir=' . $row['id'] . '\'">Edit</button></td>');

                $table->pushLine(4, '<td>');
                $table->pushLine(5, $last_updated);
                $table->pushLine(5, '<button onclick="window.location.href=\'' . $this->linkById($row['id']) . '/index.php?html-refresh=' . $row['id'] . '\'"' . $needs_update . '>HTML</button>');
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
                    $table->pushLine(4, '<td><button onclick="window.location.href=\'' . $this->linkBySlug('directory') . '/index.php?edit-dir=' . $row['id'] . '\'">Edit</button></td>');

                    $table->pushLine(4, '<td>');
                    $table->pushLine(5, $last_updated);
                    $table->pushLine(5, '<button onclick="window.location.href=\'' . $this->linkById($row['id']) . '/index.php?html-refresh=' . $row['id'] . '\'"' . $needs_update . '>HTML</button>');
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

    public function printHierarchy()
    {
        return $this->hierarchy;
    }

    public function printNewIndex($index_slug)
    {
        $page = new Element();

        $page->pushLine(0, '<?php');
        $page->pushLine(1, '// Before we do anything, we need to initialize a bunch of stuff: namely, ');
        $page->pushLine(1, '// universal constants (for ease of access) and a database connection.');
        $page->pushLine(1, 'require_once("private/initialize.php");');
        $page->pushLine(0, '?>');
        $page->pushLine(0, '<?php');
        $page->pushLine(1, '    // Page Metadata');
        $page->pushLine(1, '    $SLUG = "' . $index_slug . '";');
        $page->pushLine(0, '?>');
        $page->pushLine(0, '<?php require_once(DOC_PREFIX . SHARED_PATH . "/public-head/index.php"); ?>');
        $page->pushLine(0, "");
        $page->pushLine(2, '<main>');
        $page->pushLine(0, "");
        $page->pushLine(3, '<!-- Insert Content Here -->');
        $page->pushLine(0, "");
        $page->pushLine(2, '</main>');
        $page->pushLine(0, "");
        $page->pushLine(0, '<?php require_once(DOC_PREFIX . SHARED_PATH . "/public-foot/index.php"); ?>');

        $new_link = $this->linkBySlug($_GET['new-slug']);
        if(!is_dir("../../.." . $new_link))
        {
            if(!mkdir("../../.." . $new_link))
            {
                die("Failed to create new dir...");
            }
        }

        if(!file_exists("../../.." . $new_link . "/index.php"))
        {
            $file = fopen("../../.." . $new_link . "/index.php", 'c');
            foreach($page->getLines() as $line_num=>$line)
            {
                fwrite($file, $line . "\n");
            }
            fclose($file);
            touch("../../.." . $new_link . "/index.php");
            echo '<p class="success">New Directory and Index created at ' . $new_link . '!</p>';
        }else
        {
            echo '<p class="warning">Directory and Index already exist at ' . $new_link . '!</p>';
        }
    }
}
?>