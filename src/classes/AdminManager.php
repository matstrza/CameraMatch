<?php

class AdminManager {
    public $error;
    public static function verifyAdmin($admin) {
        $dataB = Db::getDb();
        $query= $dataB->prepare('SELECT id, username, password FROM users WHERE username = :username');
        $query->execute(['username'=>$admin->getUsername()]);
        $query->setFetchMode(PDO::FETCH_CLASS, get_class($admin));

        $response = $query->fetch();

        if(!$response || !password_verify($admin->getPassword(), $response->getPassword())) {
            $_SESSION['error']='Error';
            return false;
        }

        if($response && password_verify($admin->getPassword(), $response->getPassword())) {
        $_SESSION['userId'] = $response->getId();
        $_SESSION['username'] = $response->getUsername();
        $_SESSION['password'] = $admin->getPassword();
        return $response;
        }
    }

    public static function verifyConnectionAdmin() {
        return !empty($_SESSION['userId']);
    }
}