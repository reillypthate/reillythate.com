<?php

use Trick\DB_Manager;
use Trick\Directory;
use Trick\Image;
use Trick\Tags;
use Trick\Video;
use Trick\Entity;

use Trick\Post;
use Trick\Portfolio;

use Trick\Interfaces\SlugSet;
use Trick\Interfaces\PortfolioJoin;

define("DB_MANAGERS", 'db_managers/');
define("DIRECTORY", "directory");
define("IMAGE", "image");
define("VIDEO", "video");
define("ENTITY", "entity");
define("TAG", "tag");

define("BLOG", "post");
define("PORTFOLIO", "portfolio");

$data = array();

//  First round of data set loads.
$data[DIRECTORY] =  new Directory();
$data[IMAGE] =      new Image();
$data[VIDEO] =      new Video();
$data[ENTITY] =     new Entity();
$data[TAG] =        new Tags();
$data[PORTFOLIO] =  new Portfolio();
$data[BLOG] =       new Post();

//  Generate lookup tables for respective data sets.
foreach($data as $key=>$dataSet)
{
    if($dataSet instanceof SlugSet)
    {
        $dataSet->generateLookupTables();
    }
}
//  Generate join tables for the Portfolio object.
foreach($data as $key=>$dataSet)
{
    if($dataSet instanceof PortfolioJoin)
    {
        $data[PORTFOLIO]->addJoin($key, $dataSet->fetchPortfolioJoinTable());
    }
}
//print_r($data[PORTFOLIO]->getProjectContent("birthday-toast"));

?>