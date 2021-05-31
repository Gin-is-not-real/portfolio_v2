<div id="container-form">
    <form class="form-list" id="form-line-<?=$data['project_id']; ?>" action="index.php?action=edit-entry&id=<?=$data['project_id']; ?>" method="post">
        <input type="text" name="project_title" placeholder="Titre" maxlength="50" value="<?= $data['project_title']; ?>" disabled>
        <input type="text" name="project_describe" placeholder="Description" maxlength="255" value="<?= $data['project_describe']; ?>" disabled>
        <input type="text" name="project_image" placeholder="Image url" maxlength="255" value="<?= $data['project_image']; ?>" disabled>
        <input type="text" name="project_github" placeholder="Lien Github" value="<?= $data['project_github']; ?>" disabled>
        <input type="text" name="project_link" placeholder="Lien Projet" value="<?= $data['project_link']; ?>" disabled>
        <input type="text" id="sum-message" name="sum_message" hidden>
        <input type="submit" id="sub-edit-<?= $data['project_id'] ?>"  name="sub-valid" value="valider"  hidden></input>

        <div>
            <input type="button" id="btn-valid-edition-<?= $data['project_id'] ?>" name="btn-able-edit" value="editer" onclick="sumAndAskToConfirm(<?= $data['project_id'] ?>)" hidden></input>
            <input type="button" id="btn-edit-<?= $data['project_id'] ?>"  class="visible" name="btn-able-edit" value="editer" onclick="ableEditionModeForLine(<?= $data['project_id'] ?>)"></input>
            <input type="button" id="btn-valid-edit-<?= $data['project_id'] ?>"  name="btn-valid-edit" value="valider" hidden></input>
            <input type="checkbox" id="check-to-delete-<?= $data['project_id'] ?>"  name="check-to-delete-<?= $data['project_id'] ?>" hidden></input>
        </div>
    </form>
</div>

