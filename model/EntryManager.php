<?php 
require_once('ConnectionManager.php');

class EntryManager extends ConnectionManager {

    public function recordEntry() {
        try {
            $entry = $this->dbPDO->prepare("INSERT INTO $this->tablename (project_title, project_describe, project_image, project_github, project_link) VALUES (:project_title, :project_describe, :project_image, :project_github, :project_link)");
            $affectedLines = $entry->execute(array(
                'project_title' => $_POST['project_title'],
                'project_describe' => $_POST['project_describe'],
                'project_image' => $_POST['project_image'],
                'project_github' => $_POST['project_github'],
                'project_link' => $_POST['project_link'],
            ));
        } catch (Exception $e) {
            die('Error on recordEntry(): ' . $e->getMessage());
        }
        return $affectedLines;
    }

    public function updateEntry($id) {
        try {
            $toUp = $this->dbPDO->prepare("UPDATE $this->tablename SET project_title = :project_title, project_describe = :project_describe, project_image = :project_image, project_github = :project_github, project_link = :project_link WHERE project_id = $id");

            $affectedLines = $toUp->execute(array(
                'project_title' => $_POST['project_title'],
                'project_describe' => $_POST['project_describe'],
                'project_image' => $_POST['project_image'],
                'project_github' => $_POST['project_github'],
                'project_link' => $_POST['project_link']
            ));
        } catch (Exception $e) {
            die('Error on updateEntry(): ' . $e->getMessage());
        }
    }

    public function getEntry($id) {

        $entry = $this->dbPDO->query("SELECT project_id, project_title, project_describe, project_image, project_github, project_link FROM $this->tablename  WHERE project_id =" . $id);

        return $entry;
    }

    public function getEntries() {
        $entries = $this->dbPDO->query("SELECT project_id, project_title, project_describe, project_image, project_github, project_link FROM $this->tablename ORDER BY project_id DESC");
        return $entries;
    }

    public function deleteEntry($opId) {
        $this->dbPDO->exec("DELETE FROM $this->tablename WHERE project_id =" . $opId);
    }


    //### A TESTER
}

