<?php 
require_once("../model/EntryManager.php");
?>

<article id="article-projets">
    <!-- <header class="article-header">
        <h2>PROJETS</h2>
    </header> -->
    
    <div class="article-main" id="projets-main">

        <?php 
            $opManager = new EntryManager();
            $projects = $opManager->getEntries();

            while($data = $projects->fetch()) {
                include('project.php');
        ?>


        <?php
            }
            $projects->closeCursor();
        ?>

    </div>
</article>