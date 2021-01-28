<?php

function portfolioParallaxPreview($projectSlug, $parallaxStrength=-1, $attributes=null)
{
    global $data;

    $project = $data[PORTFOLIO]->getRowFromId(
        $data[PORTFOLIO]->idBySlug($projectSlug)
    );//$data[PORTFOLIO]->getProjectContent($projectSlug);

    $projectLink = $data[PORTFOLIO]->linkToProject($projectSlug);

    $bannerSlug = $data[IMAGE]->slugById($project['banner']);//$data[IMAGE]->getRowById($data[PORTFOLIO]->idBySlug($projectSlug));

    include(INCLUDES . "/parallax/portfolio-piece-preview.php");
}
?>