<?php 
    require_once("model/EntryManager.php");

?>
<div>Hello <?= $_SESSION['pseudo']; ?></div>

<div class="article-main" id="admin-main">

<?php 
            $opManager = new EntryManager();
            $projects = $opManager->getEntries();

            while($data = $projects->fetch()) {
                include('php/list-line.php');
        ?>


        <?php
            }
            $projects->closeCursor();
        ?>