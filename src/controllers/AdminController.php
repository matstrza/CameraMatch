<?php

class AdminController {

    public static function login() {
        if(!empty($_SESSION['userId'])) {
        header('Location: /CameraMatch/');
        } else {
            Render::render("login");

            if(!empty($_POST['username']) && !empty($_POST['password'])) {
                $admin=AdminManager::verifyAdmin(new Admin(Security::htmlSecurity($_POST['username']), $_POST['password']));
                header('Location: /CameraMatch/login');
                exit();
            }
        }
    }

    public static function logout() {
        session_unset();
        session_destroy();
        header('Location: /CameraMatch/');
        exit();
    }
}