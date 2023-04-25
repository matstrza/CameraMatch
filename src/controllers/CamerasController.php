<?php

class CamerasController {
    private $cameraManager;

    public function __construct() {
        $this->cameraManager = new CameraManager();
        $this->cameraManager->loadCameras();
    }

    public function cameras() {
        Render::render("cameras", ["cameras" => $this->cameraManager->getCameras()]);
    }

    public function showCamera($id) {
        Render::render("showCamera", ["showCamera" => $this->cameraManager->getCameraById($id)]);
    }

    public function editCamera($id) {
        $camera = $this->cameraManager->cameraById($id);
        if(!empty($camera)) {
        Render::render("editCamera", ["camera"=>$camera]);
        } else {
            header('Location: ../cameras');
            exit();
        }
    }

    public function editCameraValidator() {
        $this->cameraManager->updateCameraDb($_POST['id'],$_POST['company'], $_POST['model'], $_POST['lensMount_id'], $_POST['sensor'], $_POST['cameraType'], $_POST['imagePath'], $_POST['linkOne'], $_POST['linkTwo']);
        header('Location: ../cameras');
        exit();
    }

    public function addCamera() {
        Render::render("addCamera");
    }

    public function addCameraValidator() {
        $this->cameraManager->addCameraDb($_POST['company'],$_POST['model'], $_POST['lensMount'], $_POST['sensor'], $_POST['cameraType'], $_POST['imagePath'], $_POST['linkOne'], $_POST['linkTwo']);
        header('Location: ../cameras');
        exit();
    }

    public function deleteCamera($id) {
        $this->cameraManager->deleteCameraDb($id);
        header('Location: ../cameras');
        exit();
    }
}