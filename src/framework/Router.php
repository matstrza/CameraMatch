<?php

class Router {
    public static function route() {
        $route = '';
        $route_exploded = explode("/", filter_var($_GET['p']),FILTER_SANITIZE_URL);


        if(isset($_GET['p'])) {
            $route = $_GET['p'];
        }

        // GENERAL
        if ($route_exploded[0]  === '' || strpos($route, 'index') !== false) {
        // require "src/controllers/DefaultController.php";
        DefaultController::display();
        return;
        }
        if ($route_exploded[0]  === 'login') {
            AdminController::login();
            return;
        }
        if ($route_exploded[0]  === 'logout') {
            AdminController::logout();
            return;
        }
        if ($route_exploded[0]  === 'about') {
        AboutController::about();
        return;
        }

        // LENSES
        if ($route_exploded[0]  === 'lenses') {
            if (empty($route_exploded[1])) {
            $lensCtrl = new LensesController;
            $lensCtrl->lenses();
            return;
            }
            if ($route_exploded[1] === 'edit') {
                $lensCtrl = new LensesController;
                $lensCtrl->editLens($route_exploded[2]);
                return;
            }
            if ($route_exploded[1] === 'editValidator') {
                $lensCtrl = new LensesController;
                $lensCtrl->editLensValidator();
            }
            if ($route_exploded[1] === 'add') {
                $lenssCtrl = new LensesController;
                $lenssCtrl->addLens();
                return;
            }
            if ($route_exploded[1] === 'addValidator') {
                $lensssCtrl = new LensesController;
                $lensssCtrl->addLensValidator();
                return;
            }
            if ($route_exploded[1] === 'delete') {
                $lensCtrl = new LensesController;
                $lensCtrl->deleteLens($_POST['id']);
                return;
            }
        }

        // CAMERAS 
        if ($route_exploded[0]  === 'cameras') {
            if (empty($route_exploded[1])) {
            $cameraCtrl = new CamerasController;
            $cameraCtrl->cameras();
            return;
            }
            if ($route_exploded[1] === 'edit') {
                $cameraCtrl = new CamerasController;
                $cameraCtrl->editCamera($route_exploded[2]);
                return;
            }
            if ($route_exploded[1] === 'editValidator') {
                $cameraCtrl = new CamerasController;
                $cameraCtrl->editCameraValidator();
                return;
            }
            if ($route_exploded[1] === 'add') {
                $cameraaCtrl = new CamerasController;
                $cameraaCtrl->addCamera();
                return;
            }
            if ($route_exploded[1] === 'addValidator') {
                $cameraaaCtrl = new CamerasController;
                $cameraaaCtrl->addCameraValidator();
                return;
            }
            if ($route_exploded[1] === 'delete') {
                $cameraCtrl = new CamerasController;
                $cameraCtrl->deleteCamera($_POST['id']);
                return;
            }
        }

        // ADAPTERS
        if ($route_exploded[0]  === 'adapters') {
            if (empty($route_exploded[1])){
            $adapterCtrl = new AdaptersController;
            $adapterCtrl->adapters();
            return;
            }
            if ($route_exploded[1] === 'edit') {
                $adapterCtrl = new AdaptersController;
                $adapterCtrl->editAdapter($route_exploded[2]);
                return;
            }
            if ($route_exploded[1] === 'editValidator') {
                $adapterCtrl = new AdaptersController;
                $adapterCtrl->editAdapterValidator();
                return;
            }
            if ($route_exploded[1] === 'add') {
                $adapterCtrl = new AdaptersController;
                $adapterCtrl->addAdapter();
                return;
            }
            if ($route_exploded[1] === 'addValidator') {
                $adapterCtrl = new AdaptersController;
                $adapterCtrl->addAdapterValidator();
                return;
            }
            if ($route_exploded[1] === 'delete') {
                $adapterCtrl = new AdaptersController;
                $adapterCtrl->deleteAdapter($_POST['id']);
                return;
            }
        } else {
            Error404Controller::error404();
            return;
        }
    }
}


  