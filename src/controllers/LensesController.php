<?php

class LensesController {
    private $lensManager;

    public function __construct() {
        $this->lensManager = new LensManager();
        $this->lensManager->loadLenses();
    }

    public function lenses() {
        Render::render("lenses", ["lenses" => $this->lensManager->getLenses()]);
    }

    public function showLens($id) {
        Render::render("showLens", ["showLens" => $this->lensManager->getLensById($id)]);
    }

    public function editLens($id) {
        $lens = $this->lensManager->lensById($id);
        if(!empty($lens)) {
        Render::render("editLens", ["lens"=>$lens]);
        } else {
            header('Location: ../lenses');
            exit();
        }
    }

    public function editLensValidator() {
        $this->lensManager->updateLensDb($_POST['id'], $_POST['company'], $_POST['model'], $_POST['cameraMount_id'], $_POST['sensor'], $_POST['lensType'], $_POST['focalLength'], $_POST['maxAperture'], $_POST['imagePath'], $_POST['linkOne'], $_POST['linkTwo']);
        header('Location: ../lenses');
        exit();
    }

    public function addLens() {
        Render::render("addLens");
    }

    public function addLensValidator() {
        $this->lensManager->addLensDb($_POST['company'], $_POST['model'],  $_POST['cameraMount'],  $_POST['sensor'],  $_POST['lensType'],  $_POST['focalLength'],  $_POST['maxAperture'],  $_POST['imagePath'],  $_POST['linkOne'],  $_POST['linkTwo']);
        header('Location: ../lenses');
        exit();
    }

    public function deleteLens($id) {
        $this->lensManager->deleteLensDb($id);
        header('Location: ../lenses');
        exit();
    }
}