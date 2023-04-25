<?php

class AdaptersController {
    private $adapterManager;

    public function __construct() {
        $this->adapterManager = new AdapterManager();
        $this->adapterManager->loadAdapters();
    }

    public function adapters() {
        Render::render("adapters", ["adapters" => $this->adapterManager->getAdapters()]);
    }

    public function showAdapter($id) {
        Render::render("showAdapter", ["showAdapter" => $this->adapterManager->getAdapterById($id)]);
    }

    public function editAdapter($id) {
        $adapter = $this->adapterManager->adapterById($id);
        if(!empty($adapter)) {
            Render::render("editAdapter", ["adapter"=>$adapter]);
        } else {
            header('Location: ../adapters');
            exit();
        }
    }
    
    public function editAdapterValidator() {
        $this->adapterManager->updateAdapterDb($_POST['id'],$_POST['company'], $_POST['model'], $_POST['cameraMount_id'], $_POST['lensMount_id'], $_POST['type'], $_POST['imagePath'], $_POST['linkOne'], $_POST['linkTwo']);
        header('Location: ../adapters');
        exit();
    }

    public function addAdapter() {
        Render::render("addAdapter");
    }

    public function addAdapterValidator() {
        $this->adapterManager->addAdapterDb($_POST['company'],$_POST['model'], $_POST['cameraMount'], $_POST['lensMount'], $_POST['type'], $_POST['imagePath'], $_POST['linkOne'], $_POST['linkTwo']);
        header('Location: ../adapters');
        exit();
    }

    public function deleteAdapter($id) {
        $this->adapterManager->deleteAdapterDb($id);
        header('Location: ../adapters');
        exit();
    }
}