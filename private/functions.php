<?php 
    /**
     * User-Defined callback function that replaces the server working root directory with a static root directory.
     */
    function callback($buffer)
    {
        return (str_replace("/reillythate.com", "http://reillythate.com", $buffer));
    }
    /**
     * Use database functions to build a URL to the Images directory
     * and appand the $image filename to it.
     */
    function linkToImage($image)
    {
        return linkToPage("Images") . "/" . $image;
    }

    /**
     * For debugging -- print to browser's console.
     */
    function console_log( $data ){
        echo '<script>';
        echo 'console.log('. json_encode( $data ) .')';
        echo '</script>';
      }

    /**
     * Echo an array of lines to HTML with the proper number of tabs before each line.
     */
    function printLines($lines, $tabStart)
    {
        foreach($lines as $index=>$line)
        {
            for($i = 0; $i < $tabStart; $i++)
            {
                echo "\t";
            }
            echo $line;
            echo "\n";
        }
    }
    function getArticleLines($article)
    {
        preg_match_all('/<p>(.*?)<\/p>/', $article, $breaks);

        return $breaks[0];
    }

    function file_force_contents($dir, $contents)
    {
        $parts = explode('/', $dir);
        $file = array_pop($parts);
        $dir = '';
        foreach($parts as $part)
            if(!is_dir($dir .= "/$part")) mkdir($dir);
        file_put_contents("$dir/$file", $contents);
    }
      
?>