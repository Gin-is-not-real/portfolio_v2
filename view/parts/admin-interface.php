<?php 
    require_once("model/EntryManager.php");
?>

<div class="article-main" id="admin-main">

<!-- AJOUTER -->
    <div id="container-form-add">
        <header>
            <h3>ajouter un projet</h3>
        </header>
        <form class="form-list" id="form-add" action="accounts_index.php?action=add-project" method="post">
            <!-- <label for="project_title">TITRE</label> -->
            <input type="text" name="project_title" placeholder="Titre" maxlength="50" required>
            <!-- <label for="project_describe">DESCRIPTION</label> -->
            <input type="text" name="project_describe" placeholder="Description" maxlength="255" required/>
            <!-- <label for="project_image">URL IMAGE</label> -->
            <input type="text" name="project_image" placeholder="Image url" maxlength="255"/>
            <!-- <label for="project_github">LIEN GITHUB</label> -->
            <input type="text" name="project_github" placeholder="Lien Github"/>
            <!-- <label for="project_link">LIEN PROJET</label> -->
            <input type="text" name="project_link" placeholder="Lien Projet"/>


            <input type="submit" id="sub-add" name="sub-add" value="sub-add" hidden/>
            <input type="button" id="btn-add" name="btn-add" value="Enregistrer" />

        </form>
        <!-- <input type="button" value="add" /> -->
    </div>


<!-- LISTE -->
<?php 
            $opManager = new EntryManager();
            $projects = $opManager->getEntries();
            while($data = $projects->fetch()) {
?>
            <div id="container-form">
                <form class="form-list" id="form-line-<?=$data['project_id']; ?>" action="accounts_index.php?action=edit-project&amp;id=<?= $data['project_id']; ?>" method="post">
                    <input type="text" name="project_title" placeholder="Titre" maxlength="50" value="<?= $data['project_title']; ?>" disabled/>
                    <input type="text" name="project_describe" placeholder="Description" maxlength="255" value="<?= $data['project_describe']; ?>" disabled/>
                    <input type="text" name="project_image" placeholder="Image url" maxlength="255" value="<?= $data['project_image']; ?>" disabled/>
                    <input type="text" name="project_github" placeholder="Lien Github" value="<?= $data['project_github']; ?>" disabled/>
                    <input type="text" name="project_link" placeholder="Lien Projet" value="<?= $data['project_link']; ?>" disabled/>

                    <input type="text" id="sum-message" name="sum_message" hidden/>

                    <input type="button" id="sub-edit-<?= $data['project_id'] ?>"  name="sub-edit" value="valider"  hidden/>

                <div id="div-actions">
                    <form action="accounts_index.php?action=edit-project&amp;id=<?= $data['project_id'] ?>" method="post">

                        <input type="button" class="round-btn little red btn-edit disappear-on-edit" id="btn-edit-<?= $data['project_id']; ?>" name="btn-edit" value="edit" />

                        <input type="button" class="round-btn little red" id="btn-cancel-edit-<?= $data['project_id']; ?>" name="btn-cancel" value="annuler" hidden/>
                    </form>

                    <form action="accounts_index.php?action=suppr-project&amp;id=<?= $data['project_id'] ?>" method="post">
                        <input type="submit" class="round-btn little red sub-suppr disappear-on-edit" id="sub-suppr-<?= $data['project_id']; ?>" name="sub-suppr" value="X" hidden />

                        <input type="button" class="round-btn little red sub-suppr disappear-on-edit" id="btn-suppr-<?= $data['project_id']; ?>" name="btn-suppr" value="X"  />
                    </form>
                </div>
            </form>
        </div>
<?php
            }
            $projects->closeCursor();
        ?>

</div>