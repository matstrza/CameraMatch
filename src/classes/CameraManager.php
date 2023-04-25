<?php

class CameraManager extends Db {
    private $cameras;//array

    public function addCamera($camera) {
        $this->cameras[] = $camera;
    }

    public function getCameras() {
        return $this->cameras;
    }

    public function loadCameras() {
        $query = $this->getDb()->prepare("
        SELECT c.id, c.company, c.model, lm.lens_mount, c.sensor, c.cameraType, c.imagePath, c.linkOne, c.linkTwo
        FROM cameras c
        INNER JOIN lens_mounts lm ON c.lensMount_id = lm.id
        ORDER BY c.company, c.model
        ");
        $query->execute();
        $myCameras = $query->fetchAll(PDO::FETCH_ASSOC);
        $query->closeCursor();

        foreach($myCameras as $camera) {
            $c = new Camera($camera['id'],$camera['company'],$camera['model'],$camera['lens_mount'],$camera['sensor'],$camera['cameraType'],$camera['imagePath'],$camera['linkOne'],$camera['linkTwo']);
            $this->addCamera($c);
        }
    }

    public function cameraById($id) {
        $query = $this->getDb()->prepare("
        SELECT c.id, c.company, c.model, c.lensMount_id, lm.lens_mount, c.sensor, c.cameraType, c.imagePath, c.linkOne, c.linkTwo
        FROM cameras c
        INNER JOIN lens_mounts lm ON c.lensMount_id = lm.id
        WHERE c.id = ?
        ");
        $query->execute([$id]);
        $myCameras = $query->fetch(PDO::FETCH_ASSOC);
        $query->closeCursor();
        return $myCameras;
    }

    public function addCameraDb($company,$model,$lensMount,$sensor,$cameraType,$imagePath,$linkOne,$linkTwo) {
        $query = "
        INSERT INTO cameras (company, model, lensMount_id, sensor, cameraType, imagePath, linkOne, linkTwo)
        values (:company, :model, :lensMount, :sensor, :cameraType, :imagePath, :linkOne, :linkTwo)";
        $stmt = $this->getDb()->prepare($query);
        $stmt->bindParam(":company",$company,PDO::PARAM_STR);
        $stmt->bindParam(":model",$model,PDO::PARAM_STR);
        $stmt->bindParam(":lensMount",$lensMount,PDO::PARAM_STR);
        $stmt->bindParam(":sensor",$sensor,PDO::PARAM_STR);
        $stmt->bindParam(":cameraType",$cameraType,PDO::PARAM_STR);
        $stmt->bindParam(":imagePath",$imagePath,PDO::PARAM_STR);
        $stmt->bindParam(":linkOne",$linkOne,PDO::PARAM_STR);
        $stmt->bindParam(":linkTwo",$linkTwo,PDO::PARAM_STR);
        $result = $stmt->execute();
        $stmt->closeCursor();
    }

    public function deleteCameraDb($id) {
        $query = "
        DELETE FROM cameras WHERE id = :idcamera
        ";
        $stmt = $this->getDb()->prepare($query);
        $stmt->bindParam(":idcamera",$id,PDO::PARAM_INT);
        $result = $stmt->execute();
        $stmt->closeCursor();
    }

    public function updateCameraDb($id,$company,$model,$lensMount,$sensor,$cameraType,$imagePath,$linkOne,$linkTwo) {
        $query = "
        UPDATE `cameras` SET `company` = :company, `model` = :model, `lensMount_id` = :lensMount, `sensor` = :sensor, `cameraType` = :cameraType, `imagePath` = :imagePath, `linkOne` = :linkOne, `linkTwo` = :linkTwo WHERE `cameras`.`id` = :id";
        $stmt = $this->getDb()->prepare($query);
        $stmt->bindParam(":company",$company,PDO::PARAM_STR);
        $stmt->bindParam(":model",$model,PDO::PARAM_STR);
        $stmt->bindParam(":lensMount",$lensMount,PDO::PARAM_STR);
        $stmt->bindParam(":sensor",$sensor,PDO::PARAM_STR);
        $stmt->bindParam(":cameraType",$cameraType,PDO::PARAM_STR);
        $stmt->bindParam(":imagePath",$imagePath,PDO::PARAM_STR);
        $stmt->bindParam(":linkOne",$linkOne,PDO::PARAM_STR);
        $stmt->bindParam(":linkTwo",$linkTwo,PDO::PARAM_STR);
        $stmt->bindParam(":id",$id,PDO::PARAM_INT);
        $result = $stmt->execute();
        $stmt->closeCursor();
    }
}