<?php 

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
        preg_match_all('/<.+>(.*?)<\/.+>/', $article, $breaks);

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