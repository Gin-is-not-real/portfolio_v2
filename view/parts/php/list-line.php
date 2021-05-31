<div id="container-form">
    <form class="form-list" id="form-line-<?=$data['project_id']; ?>" action="index.php?action=edit-entry&id=<?=$data['project_id']; ?>" method="post">

        <input type="text" name="project_title" placeholder="Titre" maxlength="50" value="<?= $data['project_title']; ?>" disabled/>
        <input type="text" name="project_describe" placeholder="Description" maxlength="255" value="<?= $data['project_describe']; ?>" disabled/>
        <input type="text" name="project_image" placeholder="Image url" maxlength="255" value="<?= $data['project_image']; ?>" disabled/>
        <input type="text" name="project_github" placeholder="Lien Github" value="<?= $data['project_github']; ?>" disabled/>
        <input type="text" name="project_link" placeholder="Lien Projet" value="<?= $data['project_link']; ?>" disabled/>
        <input type="text" id="sum-message" name="sum_message" hidden/>
        <input type="submit" id="sub-edit-<?= $data['project_id'] ?>"  name="sub-valid" value="valider"  hidden/>


        <div id="div-actions">
                    <!-- SUB CONFIRM EDIT hidden-->
                    <!-- confirm button of the edition mode, appears when the line is being edited, after a clic on the sub-edit button  -->
                    <input type="submit" class="round-btn big green sub-edit-operation appear-on-edit" id="sub-confirm-edit-<?= $data['id'] ?>" name="sub-edit-operation" value="confirm" hidden />
                </form>

                    <!-- SUB EDIT MODE-->
                    <!-- make line's inputs availables, make disappear sub-edit- and sub-suppr-op buttons and appears buttons sub-confirm-edit and sub-cancel-edit -->
                    <input type="submit" class="round-btn little neutral sub-edit disappear-on-edit" id="sub-edit-<?= $data['id']; ?>" name="sub-able-edit" value="edit" onclick="switchEditModeForLine(<?= $data['id']; ?>, true)"/>

                    <!-- SUB CANCEL EDIT hidden-->
                    <!-- visible only if line is being edited -->
                    <input type="submit" class="round-btn big red sub-cancel-edit appear-on-edit" id="sub-cancel-edit-<?= $data['id']; ?>" name="sub-cancel-edit" onclick="switchEditModeForLine(<?= $data['id']; ?>, false)" value="cancel" hidden />

                    <!-- SUB SUPPR OP -->
                    <!-- made appear a popup who ask confirm for delete the line -->
                    <input type="submit" class="round-btn little red sub-suppr disappear-on-edit" id="suppr-<?= $data['id'] ?>" name="sub-suppr-op" value="X" onclick="return displayHiddePopupConfirm('You will delete the entry n° ' + <?= $data['id']; ?> + ' ?', '#sub-suppr-' + <?= $data['id']; ?>)" />

                <form action="index.php?action=suppr-operation&amp;id=<?= $data['id'] ?>" method="post">
                        <!-- SUB SUPPR ID hidden-->
                        <!-- hidden. Is activated by clic on the "yes" button of the confirm popup-->
                        <input type="submit" class="round-btn little red sub-suppr disappear-on-edit" id="sub-suppr-<?= $data['id']; ?>" name="sub-suppr-op" value="X" hidden />
                </form>
        </div>
    </form>
</div>

